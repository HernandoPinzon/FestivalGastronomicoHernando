<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('restaurants')->insert([
            [
                'user_id' => 1,
                'name' => 'La vaca loca',
                'description' => 'Comida de vaca muy buena',

                'city' => 'Manizales',
                'phone' => '3185447743',
                'category_id' => 1,
                'delivery' => 'y',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'user_id' => 1,
                'name' => 'La hamburgesa loca',
                'description' => 'Ricas hamburgesas',

                'city' => 'Pereira',
                'phone' => '3185447743',
                'category_id' => 2,
                'delivery' => 'n',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'user_id' => 1,
                'name' => 'La pizza feliz',
                'description' => 'Rica comida italiana',

                'city' => 'Armenia',
                'phone' => '00000000',
                'category_id' => 3,
                'delivery' => 'y',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]


        ]);
    }
}
