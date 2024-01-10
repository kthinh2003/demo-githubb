<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SanPham;
use App\Models\KhachHang;
class PhieuXuatController extends Controller
{
    public function DanhSachPX()
    {
        $dsKhachHang=KhachHang::all();
        $dsSanPham=SanPham::all();
        return view("xuat-hang.hoa-don-xuat",compact('dsSanPham','dsKhachHang'));
    }
}
