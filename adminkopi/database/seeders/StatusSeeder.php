<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;


class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = [
            [
                'nama' => "Active"
            ],
            [
                'nama' => "Non Active" 
            ]
        ];
        Status::insert($status);
    }
}
