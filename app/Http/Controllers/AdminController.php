<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;

class AdminController extends Controller
{
public function index(){
    return view('admin.index');
}


public function vendor(){
    $pesanans = Pesanan::all();
    return view ('admin.vendor.index', compact('pesanans'));
}
}
