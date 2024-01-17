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
                'url_maps' => 'https://maps.app.goo.gl/9psKxQSzmgiA6oTMA',
            ],
        ];

        foreach($location as $value){
            Location::create($value);
        }
    }
}
