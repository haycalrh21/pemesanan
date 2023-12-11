<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;
use App\Models\Vendor;

class AdminController extends Controller
{
public function index(){
    return view('admin.index');
}


public function layanan(){
    $pesanans = Pesanan::all();
    return view ('admin.vendor.index', compact('pesanans'));
}

public function vendor(){
    $vendors = Vendor::all();
    return view ('admin.vendor.uservendor', compact('vendors'));
}
}
