<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use App\Models\AttendeStatuse;
use Illuminate\Database\Seeder;

class AttendeStatuseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'Tepat Waktu',
            'Terlambat',
            'Tidak Hadir',
            'Izin',
            'Pulang Cepat'
        ];

        foreach ($data as $status) {
            AttendeStatuse::create(
                [
                    'name' => $status,
                    'slug' => Str::slug($status)
                ]
            );
        }
    }
}
