<?php

namespace Database\Seeders;

use App\Models\Progres;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class ProgressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID)');
        for ($i=1; $i <= 100; $i++) {
            Progres::insert([
	            'order_id'=>$i,
	            'time'=>$faker->dateTimeBetween('-1 day', 'now'),
	            'progress'=>$faker->randomElement(['In Queue','Wash','Ironing','Packing','Delivered']),
            ]);
        }
    }
}
