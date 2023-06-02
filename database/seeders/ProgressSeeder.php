<?php

namespace Database\Seeders;

use App\Models\Progress;
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

            Progress::insert([
            'pesanan_id'=>'1',
            'waktu'=>$faker->dateTime,
            'status'=> $faker->text(10),
            ]);
            Progress::insert([
                'pesanan_id'=>'2',
                'waktu'=>$faker->dateTime,
                'status'=> $faker->text(10),
                ]);
    }
}
