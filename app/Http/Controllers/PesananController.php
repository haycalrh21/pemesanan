<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PesananController extends Controller
{
    public function index()
    {
        return view('vendor.buatpesanan');
    }

    public function form(Request $request)
    {
        try {
            // Validasi form sesuai kebutuhan
            $request->validate([
                'vendor_id' => 'required|exists:vendors,id',
                'user_id' => 'required|exists:users,id',
                'jenis_pesanan' => 'required',
                'jenis_detail' => 'required',
                'nama_pesanan' => 'required',
                'lokasi_provinsi' => 'required',
                'lokasi_kota' => 'required',
                'lokasi_kecamatan' => 'required',
                'lokasi_kelurahan' => 'required',
                'status' => 'required|in:free,berbayar',
                'gambar_pesanan.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            // Simpan pesanan ke database
            $pesanan = Pesanan::create($request->except('gambar_pesanan'));

            // Proses unggahan gambar
            if ($request->hasFile('gambar_pesanan')) {
                $gambarPaths = [];
                foreach ($request->file('gambar_pesanan') as $file) {
                    $path = $file->store('gambar_pesanan', 'public');
                    $gambarPaths[] = $path;
                }
                $pesanan->gambar_pesanan = $gambarPaths;
                $pesanan->save();
            }

            return redirect('/')->with('success', 'Pesanan berhasil dibuat!');
        } catch (\Exception $e) {
            // Tangkap pesan kesalahan dan log
            Log::error('Error in PesananController@form: ' . $e->getMessage());
            return redirect('/')->with('error', 'Terjadi kesalahan. Silakan coba lagi.');
        }
    }


    public function show(){
        $pesanans = Pesanan::all();

        // dd($pesanans);
        return view('vendor.index', compact('pesanans'));
    }
}

