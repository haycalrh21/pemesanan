<?php

namespace App\Http\Controllers;

use App\Models\Vendor;

use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index(){


        $pesanans = Pesanan::all();
        return view('home.index', compact('pesanans'));
    }


    public function layanan()
    {
        $pesanans = Pesanan::all();
        $vendors = Vendor::all();

        // Ambil data provinsi
        $responseProvinsi = Http::get('https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json');
        $provinsiData = $responseProvinsi->json();

        // Ubah struktur data provinsi
        $provinsiData = collect($provinsiData)->map(function ($provinsi) {
            return [
                'id' => $provinsi['id'],
                'name' => $provinsi['name'],
            ];
        })->all();

        // Initialize $kotaData
        $kotaData = [];

        // Initialize $provinceId and $provinceName
        $provinceId = null;
        $provinceName = null;

        foreach ($pesanans as $pesanan) {
            // Get the desired province ID from each Pesanan
            $desiredProvinceId = $pesanan->province_id ?? null;

            // Skip the Pesanan if province_id is not set
            if (!$desiredProvinceId) {
                continue;
            }

            // Ambil data kota dengan menyimpan province_id
            $responseKota = Http::get("https://www.emsifa.com/api-wilayah-indonesia/api/regencies/{$desiredProvinceId}.json");
            $kotaData = $responseKota->json();

            // Ubah struktur data kota dan tambahkan province_id
            $kotaData = collect($kotaData)->map(function ($kota) use ($desiredProvinceId) {
                return [
                    'id' => $kota['id'],
                    'name' => $kota['name'],
                    'provinceId' => $desiredProvinceId,
                ];
            })->all();

            // Access data from $provinsiData based on the desired province ID
            $selectedProvinceData = collect($provinsiData)->firstWhere('id', $desiredProvinceId);

            if ($selectedProvinceData) {
                // Assign values to $provinceId and $provinceName
                $provinceId = $selectedProvinceData['id'];
                $provinceName = $selectedProvinceData['name'];

                // Do something with the province data...
            } else {
                // Handle the case when the desired province ID is not found
                // You may want to show an error message or take other actions
            }
        }

        // Check if $kotaData is empty before using it in the view
        if (empty($kotaData)) {
            // Do something if $kotaData is empty
        }


        // dd($provinsiData, $kotaData, $pesanans, $provinceId, $provinceName);
        return view('home.layanan.index', compact('pesanans', 'provinsiData', 'vendors', 'kotaData'));
    }










    public function layanansort($jenis_pesanan){
       // Ambil data pesanan berdasarkan jenisnya
    $pesanan = Pesanan::where('jenis_pesanan', strtolower($jenis_pesanan))->get();

    // Pilih tampilan berdasarkan jenis pesanan
    $viewName = 'layanan.' . strtolower($jenis_pesanan);
    $vendors = Vendor::all();
    // Kirim data pesanan ke tampilan
    return view($viewName, compact('pesanan', 'jenis_pesanan','vendors'));
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        // Menggunakan relasi antara Pesanan dan Vendor (asumsikan relasi bernama 'vendor')
        $pesanans = Pesanan::whereHas('vendor', function ($query) use ($keyword) {
            $query->where('name', 'like', '%' . $keyword . '%')
                  ->orWhere('email', 'like', '%' . $keyword . '%');
        })->orWhere('nama_pesanan', 'like', '%' . $keyword . '%')->get();

        return view('home.cari', ['pesanans' => $pesanans, 'keyword' => $keyword]);
    }

}
