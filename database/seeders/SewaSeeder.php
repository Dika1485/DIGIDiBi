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

            Sewa::insert([
                'midtrans_id' => $faker->randomDigit(),
                'akun_id' => '1',
                'method'=> $faker->name,
                'waktu' => $faker->date
            ]);
            Sewa::insert([
                'midtrans_id' => $faker->randomDigit,
                'akun_id' => '2',
                'method'=> $faker->name,
                'waktu' => now()
            ]);
            Sewa::insert([
                'midtrans_id' => $faker->randomDigit,
                'akun_id' => '3',
                'method'=> $faker->name,
                'waktu' => now()
            ]);
        }
    }
