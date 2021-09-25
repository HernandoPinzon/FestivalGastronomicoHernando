<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'name' => 'Asados',
                'description' => 'carnes de res pollo y cerdo asado',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Comida rapida',
                'description' => 'cosas que te matan pero no se demoran',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Pasta',
                'description' => 'rica pasta italiana hecha en caldas',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Comida tipica',
                'description' => 'Comida muy colombiana',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]

        ]);
    }
}
