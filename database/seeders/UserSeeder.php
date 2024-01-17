<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            [
                'userID' => 'A000000001',
                'nama' => 'Tes Admin 1',
                'alamat' => 'Jl. Letjen Sutoyo 250 Mojosongo, Jebres, Kota Surakarta',
                'no_telp' => '085700088831',
                'kategori' => 'Admin',
                'jenis_kelamin' => 'L',
                'email' => 'admin1@test.com',
                'refferal_code' => 'MH1JF89A9P8584457',
                'password' => bcrypt('admin1234567'),
                'locationID' => 'LOA001Y360',
            ],
            [
                'userID' => 'K000000001',
                'nama' => 'Tes Karyawan 1',
                'alamat' => 'Jl. Letjen Sutoyo 250 Mojosongo, Jebres, Kota Surakarta',
                'no_telp' => '085700088832',
                'jenis_kelamin' => 'P',
                'kategori' => 'Karyawan',
                'email' => 'karyawan1@test.com',
                'password' => bcrypt('karyawan1234567'),
                'locationID' => 'LOA001Y360',
            ],
            [
                'userID' => 'SA00000001',
                'nama' => 'Tes Super Admin 1',
                'alamat' => 'Jl. Letjen Sutoyo 250 Mojosongo, Jebres, Kota Surakarta',
                'no_telp' => '085700088833',
                'kategori' => 'Super Admin',
                'jenis_kelamin' => 'P',
                'email' => 'superadmin1@test.com',
                'refferal_code' => 'MH1JF89A9P8584458',
                'password' => bcrypt('superadmin1234567'),
            ],
        ];
        foreach ($user as $key => $value) {
            User::create($value);
    }
    }
}
