<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NguoiDungController extends Controller
{

    public function dangNhap()
    {
        return view('dang-nhap');
    }

    public function dangNhapHandler(Request $request)
    {

        if(Auth::attempt(['ten_dang_nhap'=>$request->ten_dang_nhap,'password'=>$request->password]))
        {
            return redirect()->route('sinh-vien.danh-sach');
        }
        return "Đăng nhập không thành công";
    }

    public function thongTinNguoiDung()
    {
        if(Auth ::check())
        {
             $user=Auth::user();
            return $user;
         }
        return "Người dùng chưa đăng nhập";
    }
    public function dangXuat()
    {
        Auth::logout();
        return redirect()->route('dang-nhap');
    }
}
