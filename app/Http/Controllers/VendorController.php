<?php

namespace App\Http\Controllers;

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

    public function profile(){
        $user = Auth::user();
        $vendor = $user->vendor;

        // Periksa apakah vendor ditemukan
        if ($vendor) {
            return view('vendor.profile', compact('vendor'));
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
