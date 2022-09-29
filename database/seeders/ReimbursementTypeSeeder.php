<?php

namespace Database\Seeders;

use App\Models\ReimbursementType;
use Illuminate\Database\Seeder;

class ReimbursementTypeSeeder extends Seeder
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
                'reimb_type' => 'Tol'
            ]

        ];

        foreach ($data as $category) {
            ReimbursementType::create($category);
        }
    }
}
