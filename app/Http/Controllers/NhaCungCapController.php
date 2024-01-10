<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NhaCungCap;

class NhaCungCapController extends Controller
{
    public function themMoi()
    {
        # Lấy danh sách lớp học
        $dsNhaCungCap = NhaCungCap::all();

        return view('sinh-vien.them-moi', compact('dsLopHoc'));
    }

    public function xuLyThemMoi(Request $request)
    {
        $nhaCungCap = new NhaCungCap();

        $nhaCungCap->ten       = $request->ten;
        $nhaCungCap->dia_chi       = $request->dia_chi;
        $nhaCungCap->sdt        = $request->sdt;
        $nhaCungCap->save();
        return "Them moi nhà cung cấp thành công";
    }

    public function danhSach()
    {
        // Lay toan bo danh sach sinh vien
        $dsNhaCungCap = NhaCungCap::all();
        return view("sinh-vien.danh-sach", compact('dsSinhVien'));
    }

}
