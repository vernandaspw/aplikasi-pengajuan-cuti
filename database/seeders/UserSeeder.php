<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'username' => 'admin',
                'password' => Hash::make('admin'),
                'nama' => null,
                'nik' => null,
                'devisi' => null,
                'posisi' => null,
                'tgl_lahir' => null,
                'sex' => null,
                'alamat' => null,
                'phone' => null,
                'role' => 'admin',

            ],
            [
                'username' => 'pegawai',
                'password' => Hash::make('pegawai'),
                'nama' => 'budi',
                'nik' => '332532532532',
                'devisi' => 'sekertariat',
                'posisi' => 'staff',
                'tgl_lahir' => '2000-01-01',
                'sex' => 'm',
                'alamat' => 'jl. sudirman ambarawa',
                'phone' => '8345325235',
                'role' => 'pegawai',

            ],

        ]);
    }
}
