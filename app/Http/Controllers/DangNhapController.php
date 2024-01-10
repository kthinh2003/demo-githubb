<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DangNhap;
use App\Models\KhachHang;
class DangNhapController extends Controller
{
    public function dangNhap()
    {
        return view('dang-nhap');
    }

    public function xyLyDangNhap(Request $rq)
    {
        $admin = DangNhap::where('tai_khoan', '=',$rq->tk)->where('mat_khau', '=', $rq->pass)->first();
        $KhachHang = KhachHang::where('ten_tk', '=',$rq->tk)->where('mat_khau', '=', $rq->pass)->first();

        if(empty($admin)){
            //return view('dang-nhap/dang-nhap');
            if(empty($KhachHang))
            {
                return "hello";
                // return view('dang-nhap/dang-nhap');
            }
            else
            {
                session(['KH_Login'=> $admin]);
                return redirect()->route('sinh-vien.danh-sach');
            }
        }

        session(['admin_login'=> $admin]);

        return redirect()->route('lop-hoc.danh-sach');



    }

    public function DangXuat(){
        session()->forget('admin_login');
        return redirect()->route('dang-nhap');
    }
}
