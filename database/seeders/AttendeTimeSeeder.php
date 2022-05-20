<?php

namespace Database\Seeders;

use App\Models\AttendeTime;
use Illuminate\Database\Seeder;

class AttendeTimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AttendeTime::create(
            [
                'start_time' => "10:00",
                'end_time' => '19:00'
            ],
            [
                'start_time' => "12:00",
                'end_time' => '21:00'
            ]
        );
    }
}
