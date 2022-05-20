<?php

namespace Database\Seeders;

use App\Models\LeaveCategory;
use Illuminate\Database\Seeder;

class LeaveCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Reimburse',
                'limit' => 0
            ],
            [
                'name' => 'Cuti Tahunan',
                'limit' => 12
            ],
            [
                'name' => 'Cuti Alasan Penting',
                'limit' => 60
            ],
            [
                'name' => 'Cuti Bersalin',
                'limit' => 90
            ],
            [
                'name' => 'Cuti Sakit',
                'limit' => 545
            ],
            [
                'name' => 'Cuti Diluar Tanggungan',
                'limit' => 90
            ],

        ];

        foreach ($data as $category) {
            LeaveCategory::create($category);
        }

    }
}
