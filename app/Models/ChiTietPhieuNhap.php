<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietPhieuNhap extends Model
{
    use HasFactory;
    protected $table="chi_tiet_phieu_nhap";
    public function san_phan(){
        return $this->belongto(SanPham::class);
    }
}
