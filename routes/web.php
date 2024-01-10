<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SinhVienController;
use App\Http\Controllers\LopHocController;
use App\Http\Controllers\DangNhapController;
use App\Http\Controllers\KhachHangController;
use App\Http\Controllers\PhieuNhapController;
use App\Http\Controllers\PhieuXuatController;
use App\Http\Controllers\NguoiDungController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('guest')->group(function(){
    Route::get('dang-nhap',[NguoiDungController::class,'dangNhap'])->name('dang-nhap');
    Route::post('dang-nhap',[NguoiDungController::class,'dangNhapHandler'])->name('xl-dang-nhap');
});

Route::get('thong-tin',[NguoiDungController::class,'thongTinNguoiDung'])->name('thong-tin');
Route::get('dang-xuat',[NguoiDungController::class,'dangXuat'])->name('dang-xuat');

Route::get('phieu-nhap/them-moi',[PhieuNhapController::class,'DanhSachPN'])->name('phieu-nhap.them-moi');
Route::get('xuat-hang/hoa-don-xuat',[PhieuXuatController::class,'DanhSachPX'])->name('xuat-hang.hoa-don-xuat');



Route::get('khach-hang', [KhachHangController::class, 'DanhSachKH'])->name('khach-hang.danh-sach');
Route::get('khach-hang/cap-nhat/{id}', [KhachHangController::class, 'capNhat'])->name('khach-hang.cap-nhat');
Route::post('khach-hang/cap-nhat/{id}', [KhachHangController::class, 'xuLyCapNhat'])->name('khach-hang.xl-cap-nhat');
Route::get('khach-hang/them-moi', [KhachHangController::class, 'themMoi'])->name('khach-hang.them-moi');
Route::post('khach-hang/them-moi', [KhachHangController::class, 'xuLyThemMoi'])->name('khach-hang.xl-them-moi');
Route::get('khach-hang/xoa/{id}', [KhachHangController::class, 'xoa'])->name('khach-hang.xoa');

// Route::prefix('san-pham')->group(function(){
//     Route :: name(())
// })


// Route::get('dang-nhap', [DangNhapController::class, 'dangNhap'])->name('dang-nhap');
// Route::post('dang-nhap', [DangNhapController::class, 'xyLyDangNhap'])->name('xl-dang-nhap');
// Route::get('dang-xuat', [DangNhapController::class, 'DangXuat'])->name('dang-xuat');

Route::get('sinh-vien/them-moi', [SinhVienController::class, 'themMoi'])->name('sinh-vien.them-moi');
Route::post('sinh-vien/them-moi', [SinhVienController::class, 'xuLyThemMoi'])->name('sinh-vien.xl-them-moi');

Route::get('sinh-vien', [SinhVienController::class, 'danhSach'])->name('sinh-vien.danh-sach');

Route::get('sinh-vien/cap-nhat/{id}', [SinhVienController::class, 'capNhat'])->name('sinh-vien.cap-nhat');
Route::post('sinh-vien/cap-nhat/{id}', [SinhVienController::class, 'xuLyCapNhat'])->name('sinh-vien.xl-cap-nhat');

Route::get('sinh-vien/xoa/{id}', [SinhVienController::class, 'xoa'])->name('sinh-vien.xoa');



Route::get('lop-hoc/them-moi', [LopHocController::class, 'themMoi'])->name('lop-hoc.them-moi');
Route::post('lop-hoc/them-moi', [LopHocController::class, 'xuLyThemMoi'])->name('lop-hoc.xl-them-moi');

Route::get('lop-hoc/danh-sach', [LopHocController::class, 'danhSach'])->name('danh-sach.lop-hoc');

Route::get('lop-hoc/cap-nhat/{id}', [LopHocController::class, 'capNhat'])->name('lop-hoc.cap-nhat');
Route::post('lop-hoc/cap-nhat/{id}', [LopHocController::class, 'xuLyCapNhat'])->name('lop-hoc.xl-cap-nhat');

Route::get('lop-hoc/xoa/{id}', [LopHocController::class, 'xoa'])->name('lop-hoc.xoa');




