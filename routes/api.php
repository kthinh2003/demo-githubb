<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APISanPhamController;
use App\Http\Controllers\APILoaiSanPhamController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
#xu ly san pham
Route::get("/san-pham",[APISanPhamController::class,"layDanhSach"]);
Route::get("/san-pham/{id}",[APISanPhamController::class,"layChiTiet"]);

Route::post("/san-pham",[APISanPhamController::class,"themMoi"]);
Route::put("/san-pham/{id}",[APISanPhamController::class,"capNhat"]);
Route::delete("/san-pham/{id}",[APISanPhamController::class,"xoa"]);

Route::post("/san-pham/tim-kiem",[APISanPhamController::class,"timKiem"]);

#xu ly loai san pham
Route::get("/loai-san-pham",[APILoaiSanPhamController::class,"layDanhSach"]);
Route::get("/loai-san-pham/{id}",[APILoaiSanPhamController::class,"layChiTiet"]);

Route::post("/loai-san-pham",[APILoaiSanPhamController::class,"themMoi"]);
Route::put("/loai-san-pham/{id}",[APILoaiSanPhamController::class,"capNhat"]);
Route::delete("/loai-san-pham/{id}",[APILoaiSanPhamController::class,"xoa"]);

Route::post("/loai-san-pham/tim-kiem",[APISanPhamController::class,"timKiem"]);