<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SanPham;
use App\Models\NhaCungCap;

class PhieuNhapController extends Controller
{
    public function DanhSachPN(){
        // $dsPN = PhieuNhap::all();
        $dsNhaCungCap=NhaCungCap::all();
        $dsSanPham= SanPham::all();
        // dd($dsNhaCungCap);
         return view("phieu-nhap/them-moi", compact('dsSanPham','dsNhaCungCap'));
    }


}

