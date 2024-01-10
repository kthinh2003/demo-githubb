<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoaiSanPham extends Model
{
    use HasFactory;
    protected $table = "loai_san_pham";
    protected $hidden = ['created_at', 'updated_at'];
    public function ds_san_pham()
    {
        return $this->hasMany(SanPham::class);
    }
}
