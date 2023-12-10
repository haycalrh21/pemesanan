<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        return view('home.index');
    }
    public function formvendor(){
        return view ('home.menjadivendor.index');
    }




    public function daftar(Request $request)
    {
        // Validasi email tidak boleh duplikat sebelum menyimpan
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'nohp' => 'required',
            'vendor' => 'required',
        ]);

        // Dapatkan ID pengguna yang sedang login
        $loggedInUserId = Auth::id();

        // Simpan data ke dalam tabel 'vendors' berdasarkan pengguna yang login
        $vendor = new Vendor;
        $vendor->name = $request->name;
        $vendor->email = $request->email;
        $vendor->alamat = $request->alamat;
        $vendor->nohp = $request->nohp;
        $vendor->vendor = $request->vendor;
        $vendor->user_id = $loggedInUserId; // Mengaitkan vendor dengan user yang login
        $vendor->save();

        // Ubah peran pengguna yang login menjadi 'vendor'
        Auth::user()->update(['role' => 'vendor']);

        // ... tambahkan logika lainnya

        return redirect('/');
    }


}
