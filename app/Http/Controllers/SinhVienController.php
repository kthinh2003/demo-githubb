<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SinhVien;
use App\Models\LopHoc;

class SinhVienController extends Controller
{
    public function themMoi()
    {
        # Lấy danh sách lớp học
        $dsLopHoc = LopHoc::all();

        return view('sinh-vien.them-moi', compact('dsLopHoc'));
    }

    public function xuLyThemMoi(Request $request)
    {
        $sinhVien = new SinhVien();
        $sinhVien->mssv         = $request->mssv;
        $sinhVien->ho_ten       = $request->ho_ten;
        $sinhVien->lop_id       = $request->lop;
        $sinhVien->email        = $request->email;
        $sinhVien->dien_thoai   = $request->dien_thoai;
        $sinhVien->save();
        return "Them moi sinh vien thanh cong";
    }

    public function danhSach()
    {
        // Lay toan bo danh sach sinh vien
        $dsSinhVien = SinhVien::all();
        return view("sinh-vien.danh-sach", compact('dsSinhVien'));
    }

    public function capNhat($id)
    {
        // Lay thong tin sinh vien theo id
        $sinhVien = SinhVien::find($id);
        if (empty($sinhVien)) {
            return "Sinh vien khong ton tai";
        }

        return view('sinh-vien.cap-nhat', compact('sinhVien'));
    }

    public function xuLyCapNhat(Request $request, $id)
    {
        // Lay thong tin sinh vien theo id
        $sinhVien = SinhVien::find($id);
        if (empty($sinhVien)) {
            return "Sinh vien khong ton tai";
        }
        
        $sinhVien->mssv         = $request->mssv;
        $sinhVien->ho_ten       = $request->ho_ten;
        $sinhVien->lop_id       = $request->lop;
        $sinhVien->email        = $request->email;
        $sinhVien->dien_thoai   = $request->dien_thoai;
        $sinhVien->save();

        return "Cap nhat sinh vien thanh cong";
    }

    public function xoa($id)
    {
        // Lay thong tin sinh vien theo id
        $sinhVien = SinhVien::find($id);
        if (empty($sinhVien)) {
            return "Sinh vien khong ton tai";
        }
        
        $sinhVien->delete();

        return "Xoa sinh vien thanh cong";
    }
}
