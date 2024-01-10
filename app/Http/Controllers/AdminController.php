<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LopHoc;
use App\Models\Admin;

class AdminController extends Controller
{
    //
    public function danhSach()
    {
        // Lay toan bo danh sach admin
        // $adminLogin = session()->get('admin_login');
        // if(empty($adminLogin)){
        //     return redirect()->route('admin.dang-nhap');
        // }
        $dsadmin= Admin::all();
        return view("admin.danh-sach",compact('dsadmin') );
        
        
    }
    public function themMoi()
    {
        # Lấy danh sách lớp học
        $dsadmin = Admin::all();

        return view('admin.them-moi', compact('dsadmin'));
    }

    public function xuLyThemMoi(Request $request)
    {
        $admin = new Admin();
        // $admin->id        = $request->id;
        $admin->ten_dang_nhap       = $request->ten_dang_nhap;
        $admin->mat_khau           = $request->mat_khau;

        $admin->save();
        //  return "Them moi admin thanh cong";
        return redirect()->route('admin.danh-sach')->with(['thong_bao'=>"Thêm tài khoản thành công"]);
    }
    public function capNhat($id)
    {
        // Lay thong tin  theo id
        $admin = Admin::find($id);
        if (empty($admin)) {
            // return "Admin khong ton tai";
            return redirect()->route('admin.danh-sach')->with(['thong_bao'=>"Admin không tồn tại"]);
        }

        return view('admin.cap-nhat', compact('admin'));
    }

    public function xuLyCapNhat(Request $request, $id)
    {
        // Lay thong tin adin theo id
        $admin = Admin::find($id);
        if (empty($admin)) {
            // return "Admin khong ton tai";
            return redirect()->route('admin.danh-sach')->with(['thong_bao'=>"Admin khong ton tai"]);
        }
        
        // $admin->id         = $request->id;
        $admin->ten_dang_nhap       = $request->ten_dang_nhap;
        $admin->mat_khau           = $request->mat_khau;
  
        $admin->save();

        // return "Cap nhat admin thanh cong";
        return redirect()->route('admin.danh-sach')->with(['thong_bao'=>"Cap nhat admin thanh cong"]);
    }

    public function xoa($id)
    {
        // Lay thong tin  theo id
        $admin = Admin::find($id);
        if (empty($admin)) {
            // return "Admin khong ton tai";
            return redirect()->route('admin.danh-sach')->with(['thong_bao'=>"Admin không tồn tại"]);
        }
        
        $admin->delete();

        // return "Xoa Admin thanh cong";
        return redirect()->route('admin.danh-sach')->with(['thong_bao'=>"Xóa admin thành công"]);
    }

    public function dangNhap()
    {

        return view('admin.dang-nhap');
    }

    public function xuLyDangNhap(Request $request)
    {
        $admin = Admin::where('ten_dang_nhap',$request->ten_dang_nhap)->where('mat_khau',$request->mat_khau)->first();
        if(empty($admin))
        {
            return view('admin.dang-nhap');
            
        }
        else{
        session(['admin_login=>$admin']);
        return redirect()->route('admin.danh-sach');
        }
    }
    public function dangXuat()
    {
        session()->forget('admin_login');
        return redirect()->route('admin.dang-nhap');
    }
}
