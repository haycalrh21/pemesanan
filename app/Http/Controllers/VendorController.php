<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VendorController extends Controller
{
    public function index(){
 // Mendapatkan ID pengguna yang sedang login
 $userId = Auth::id();

 // Mendapatkan pesanan berdasarkan user_id
 $pesanans = Pesanan::where('user_id', $userId)->get();

 return view('vendor.index', ['pesanans' => $pesanans]);
    }

    public function profile() {
        // Mengambil user yang sedang login
        $user = Auth::user();

        // Memastikan user memiliki vendor
        if ($user->vendor) {
            $vendor = $user->vendor;

            // Inisialisasi variabel $folderPath
            $folderPath = "vendors/{$user->vendor->id}";

            return view('vendor.profile', compact('vendor', 'folderPath'));
        } else {
            // Handle jika vendor tidak ditemukan, misalnya, redirect dengan pesan kesalahan
            return redirect()->route('profile')->with('error', 'Vendor profile not found');
        }
    }


    public function delete($id){

        $pesanan= Pesanan::findorFail($id);
        $pesanan->delete();

        return redirect()->route('vendor.index');
    }

}
