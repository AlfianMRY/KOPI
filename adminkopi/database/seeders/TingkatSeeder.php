<?php

namespace Database\Seeders;

use App\Models\Tingkat;
use Illuminate\Database\Seeder;

class TingkatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tingkat = [
            [
                'nama' => "M 0"
            ],
            [
                'nama' => "M 1" 
            ],
            [
                'nama' => "M 2"
            ],
            [
                'nama' => "M 3" 
            ],
        ];
        Tingkat::insert($tingkat);
    }
}
