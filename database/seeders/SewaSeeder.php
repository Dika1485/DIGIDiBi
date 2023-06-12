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
        for ($i=1; $i <= 10; $i++) { 
            Sewa::insert([
                'user_id' =>$i,
                'midtrans_id' => rand(),
                'method' => "bank_transfer",
                'status' => 'settlement',
                'amount' => 10000,
                'time' => $faker->dateTimeBetween('-1 month', 'now')
            ]);
        }
        }
    }
