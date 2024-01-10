<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KhachHang;
class KhachHangController extends Controller
{
    //
    public function DanhSachKH(){
        $dsKH = KhachHang::all();
         return view("khach-hang.danh-sach", compact('dsKH'));
    }

    public function capNhat($id)
    {
    
        $KH = KhachHang::find($id);
        if (empty($KH)) {
            return "Khach hang khong ton tai";
        }

        return view('khach-hang.cap-nhat', compact('KH'));
    }

    public function xuLyCapNhat(Request $request, $id)
    {
        $KH = KhachHang::find($id);
        if (empty($KH)) {
            return "Khach hang khong ton tai";
        }
        
        $KH->ten_kh         = $request->ten_kh;
        $KH->dia_chi      = $request->dia_chi;
        $KH->sdt       = $request->sdt;
        $KH->ten_tk        = $request->ten_tk;
        $KH->mat_khau   = $request->mat_khau;
        $KH->save();

        return "Cap nhat khach hang thanh cong";
    }

    public function xoa($id)
    {

        $KH = KhachHang::find($id);
        if (empty($KH)) {
            return "Khach hang khong ton tai";
        }
        
        $KH->delete();

        return "Xoa khach hang thanh cong";
    }

    public function themMoi()
    {
        return view('khach-hang.them-moi');
    }

    public function xuLyThemMoi(Request $request)
    {
        $KH = new KhachHang();
        $KH->ten_kh         = $request->ten_kh;
        $KH->dia_chi      = $request->dia_chi;
        $KH->sdt       = $request->sdt;
        $KH->ten_tk        = $request->ten_tk;
        $KH->mat_khau   = $request->mat_khau;
        $KH->save();
        return "Them moi khach hang thanh cong";
    }

}

