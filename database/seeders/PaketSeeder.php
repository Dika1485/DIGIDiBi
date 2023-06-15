<?php

namespace Database\Seeders;

use App\Models\Paket;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class PaketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        for ($i=1; $i <= 10; $i++) {
        	Paket::insert([
        		'user_id'=>$faker->numberBetween(2,12),
        		'name'=>$faker->randomElement(['Reguler','One Day','Executive']),
        		'price'=> $faker->randomDigitNotNull()*10000,
        		'isironing'=> $faker->boolean(),
        		'estimation'=> $faker->numberBetween(1,6)*12,
                'deleted'=>0,
            ]);
        }
    }
}
