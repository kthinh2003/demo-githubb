<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    use HasFactory;
    protected $table = "san_pham";
    protected $hidden=['loai_san_pham_id','created_at','updated_at','trang_thai'];
    public function loai_san_pham(){
        return $this->belongsTo(LoaiSanPham::class);
    }
}
