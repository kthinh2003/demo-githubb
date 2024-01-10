<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\NguoiDung;
use Illuminate\Support\Facades\Hash;

class ThemAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new NguoiDung();
        $user->ten_dang_nhap=('thinh');
        $user->password = Hash::make('12345');
        $user->ho_ten=('thinhdeptrai');
        $user->save();

        echo 'Thêm user thành công';

    }
}
