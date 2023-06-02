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
        $faker = Faker::create('id_ID)');

            Paket::insert([
            'akun_id'=>'1',
            'nama'=>'Reguler',
            'harga'=> $faker->randomDigit(),
            'isetrika'=> $faker->boolean(),
            'estimasi'=> $faker->randomDigit()
            ]);
            Paket::insert([
                'akun_id'=>'2',
                'nama'=>'Setrika',
                'harga'=> $faker->randomDigit(),
                'isetrika'=> $faker->boolean(),
                'estimasi'=> $faker->randomDigit()
                ]);
    }
}
