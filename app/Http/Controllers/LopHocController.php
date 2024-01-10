<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LopHoc;

class LopHocController extends Controller
{
    public function themMoi()
    {
        // tra ve view resources/views/them-moi.blade.php
        return view('lop.them-moi');
    }

    public function xuLyThemMoi(Request $request)
    {
        $lopHoc = new LopHoc();
        $lopHoc->ten = $request->ten;
        $lopHoc->save();
        return redirect()->route('lop-hoc.danh-sach')->with(['thong_bao' => "Them moi thanh cong"]);
    }

    public function danhSach()
    {
        // $adminLogin = session()->get('admin_login');
        // if(empty($adminLogin)){
        //     return redirect()->route('dang-nhap');
        // }
        $dsLopHoc = LopHoc::all();
        return view('lop/danh-sach', compact('dsLopHoc'));
    }

    public function capNhat($id)
    {
        $lopHoc = LopHoc::find($id);
        if (empty($lopHoc)) {
            return "Lớp học khong ton tai";
        }

        return view('lop.cap-nhat', compact('lopHoc'));
        return redirect()->route('lop-hoc.danh-sach')->with(['thong_bao' => "Cap nhat thanh cong"]);
    }

    public function xuLyCapNhat(Request $request, $id)
    {
        $lopHoc = LopHoc::find($id);
        if (empty($lopHoc)) {
            return "Lop hoc khong ton tai";
        }

        $lopHoc->ten = $request->ten;
        $lopHoc->save();
        return redirect()->route('lop-hoc.danh-sach')->with(['thong_bao' => "Cap nhat thanh cong"]);
    }

    public function xoa($id)
    {
        $lopHoc = LopHoc::find($id);
        if (empty($lopHoc)) {
            return "Lop hoc khong ton tai";
        }

        $lopHoc->delete();

        return redirect()->route('lop-hoc.danh-sach')->with(['thong_bao' => "Xoa thanh cong"]);
    }
}
