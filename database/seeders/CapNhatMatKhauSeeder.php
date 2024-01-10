<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\NguoiDung;
use Illuminate\Support\Facades\Hash;

class CapNhatMatKhauSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $users = NguoiDung::all();
       foreach($users as $user)
       {
        echo "Cập nhật mật khẩu cho user {$user->ten_dang_nhap}";
        $user->password = Hash::make($user->password);
        $user->save();
       }
    }
}
