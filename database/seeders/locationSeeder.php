<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Location;

class locationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $location = [
            [
                'locationID' => 'LOA001Y360',
                'namaCabang' => 'Test Location 1',
                'alamat' => 'Jl. Letjen Sutoyo 83 Mojosongo, Jebres, Kota Surakarta, Jawa Tengah 57127',
                'no_telp' => '085700088831',
                'email' => 'testlocation1@telmark.co.id',
                'url_maps' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.5341270935533!2d110.43241337480438!3d-7.733026276643006!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a5bdda90516bf%3A0x807ec83c905422bc!2sGereja%20Katolik%20Santo%20Petrus%20dan%20Paulus%2C%20Babadan!5e0!3m2!1sid!2sid!4v1706182061611!5m2!1sid!2sid',
                'status' => 'Dummy',
            ],
        ];

        foreach($location as $value){
            Location::create($value);
        }
    }
}
