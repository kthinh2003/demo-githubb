<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SinhVien extends Model
{
    use HasFactory;
    protected $table = "sinh_vien";

    public function lop() {
        return $this->belongsTo(LopHoc::class);
    }
}
