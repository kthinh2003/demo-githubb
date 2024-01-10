<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChiTietPhieuNhap;
use App\Models\PhieuNhap;
use App\Models\DangNhap;
use App\Models\NhaCungCap;
use App\Models\SanPham;
class PhieuNhapController extends Controller
{
    public function themMoi(){
        $dsNhaCungCap= NhaCungCap::all();
        $chiTietPhieuNhap = ChiTietPhieuNhap::all();
        $dsSanPham=SanPham::all();
        return view("phieu-nhap.them-moi",compact('dsSanPham','dsNhaCungCap'));
    }
    public function xulyThemMoi(Request $request){
        $phieuNhap= new PhieuNhap();
        $phieuNhap->nha_cung_cap_id=$request->ncc;
        $phieuNhap->save();
        $tongTien=0;

        for($i=0;$i<count($request->spID);$i++)
        {
        $ctpn = new ChiTietPhieuNhap();
        $ctpn->id_phieunhap = $request->phieuNhap;
        $ctpn->id_sanpham = $request->spID[$i];
         $ctpn->so_luong = $request->soLuong[$i];
        $ctpn->gia_nhap = $request->giaNhap[$i];
        $ctpn->gia_ban = $request->giaBan[$i];
        $ctpn->thanh_tien = $request->thanhTien[$i];
      $ctpn->save();
    $tongTien+=$ctpn->thanh_tien;

    $sanPham=SanPham::find($ctpn->id_sanpham);
    $sanPham->so_luong+=$ctpn->so_luong;
    $sanPham->gia_ban=$ctpn->gia_ban;
    $sanPham->save();
        }
        $phieuNhap->tong_tien=$tongTien;
        $phieuNhap->save();

        return redirect()->route('san-pham.danh-sach')->with(['thong_bao'=>"Nhập đơn hàng {$sanPham->ten} thành công"]);
    }

}
