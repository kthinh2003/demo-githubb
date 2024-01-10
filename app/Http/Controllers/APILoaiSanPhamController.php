<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoaiSanPham;
class APILoaiSanPhamController extends Controller
{
    public function layDanhSach(){
        $dsloaiSanPham=LoaiSanPham::with('ds_san_pham')->get();
        return response()->json([
            'success'=>true,
            'data'=>$dsloaiSanPham
        ]);
    }

    public function layChiTiet($id)
    {
        $dsloaiSanPham=LoaiSanPham::find($id);
        if(empty($loaiSanPham))
       {
        return response()->json([
            'success'=>false,
            'message'=>"Loai san pham ID {$id} khong ton tai"
        ]);
       }

       return response()->json([
        'success'=>true,
        'data'=>$loaiSanPham
    ]);
    }

    public function themMoi(Request $request)
    {
        $loaiSanPham=new LoaiSanPham();
     $count=LoaiSanPham::where('ten',$request->ten)->count();
     if($count>0){
        return response()->json([
            'success'=>true,
            'message'=>"Tên Loại sản phẩm  {$request->ten} đã tồn tại"
        ]);
    }

    $loaiSanPham->ten=$request->ten;
    $loaiSanPham->save();

    return response()->json([
        'success'=>true,
        'message'=>"Thêm mới loại sản phẩm {$loaiSanPham->ten} thanh cong"
    ]);
    }

    public function capNhat(Request $request, $id)
    {
        $loaiSanPham=LoaiSanPham::find($id);
        $loaiSanPham->ten=$request->ten;
        $loaiSanPham->trang_thai=$request->trang_thai;
        $loaiSanPham->save();

        if(empty($loaiSanPham))
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
        $loaiSanPham=LoaiSanPham::find($id);
        if(empty($loaiSanPham))
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
         $loaiSanPham=LoaiSanPham::where('ten',$request->ten)->first();
        if(empty($loaiSanPham))
        {
         return response()->json([
             'success'=>false,
             'message'=>"Loai san pham ten{$request->ten} khong ton tai"
         ]);
        }
        return response()->json([
            'success'=>true,
            'message'=>$loaiSanPham
        ]);
    }
}
