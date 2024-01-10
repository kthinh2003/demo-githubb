<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SanPham;

class APISanPhamController extends Controller
{
    public function layDanhSach()
    {
        $dsSanPham=SanPham::all();
        return response()->json([
            'success'=>true,
            'data'=>$dsSanPham
        ]);
    }

    public function layChiTiet($id)
    {
        $dsSanPham=SanPham::find($id);
        if(empty($sanPham))
       {
        return response()->json([
            'success'=>false,
            'message'=>"San pham ID {$id} khong ton tai"
        ]);
       }

       return response()->json([
        'success'=>true,
        'data'=>$dsSanPham
    ]);
    }
    public function themMoi(Request $request, $id)
    {
        $sanPham=new SanPham();
         $sanPham->ten=$request->ten;
         $sanPham->loaisp_id=$request->loaisp_id;
         $sanPham->trang_thai=1;
        $sanPham->save();

        return response()->json([
            'success'=>true,
            'message'=>"Them moi san pham ID {$id} thanh cong"
        ]);
    }

    public function capNhat(Request $request, $id)
    {
         $sanPham=SanPham::find($id);
         $sanPham->ten=$request->ten;
        $sanPham->trang_thai=$request->trang_thai;
         $sanPham->save();

        if(empty($sanPham))
        {
         return response()->json([
             'success'=>false,
             'message'=>"Loai san pham ID {$id} khong ton tai"
         ]);
        }
        return response()->json([
            'success'=>true,
            'message'=>"Cap nhat loai san pham ID {$id} thanh cong"
        ]);
    }

    public function xoa( $id)
    {
        $sanPham=SanPham::find($id);
        if(empty($sanPham))
        {
         return response()->json([
             'success'=>false,
             'message'=>"Loai san pham ID {$id} khong ton tai"
         ]);
        }
        return response()->json([
            'success'=>true,
            'message'=>"Xoa san pham ID {$id} thanh cong"
        ]);
    }

    public function timKiem(Request $request, $id)
    {
         $sanPham=SanPham::where('ten',$request->ten)->first();
        if(empty($sanPham))
        {
         return response()->json([
             'success'=>false,
             'message'=>"San pham ten{$request->ten} khong ton tai"
         ]);
        }
        return response()->json([
            'success'=>true,
            'message'=>$sanPham
        ]);
    }
}