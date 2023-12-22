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
        $pesanans = Pesanan::paginate(10);
        return view('home.layanan.index', compact('pesanans', 'vendors'));
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
