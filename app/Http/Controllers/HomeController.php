<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pesanan;

class HomeController extends Controller
{
    public function index(){
        $pesanans = Pesanan::all();
        return view('home.index', compact('pesanans'));
    }


    public function layanan(){
        $pesanans = Pesanan::all();
        return view('home.layanan.index',compact('pesanans'));
    }
}
