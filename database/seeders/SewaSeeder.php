<?php

namespace Database\Seeders;
use App\Models\Sewa;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class SewaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID)');
        for ($i=2; $i <= 13; $i++) { 
            Sewa::insert([
                'user_id' =>$i,
                'midtrans_id' => NULL,
                'method' => $faker->randomElement(['bank_transfer','qris']),
                'status' => 'settlement',
                'amount' => 10000,
                'time' => $faker->dateTimeBetween('-1 month', 'now')
            ]);
        }
        }
    }
