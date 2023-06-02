<?php

namespace Database\Seeders;


use App\Models\Pesanan;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class PesananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID)');

        Pesanan::insert([
        'paket_id'=>'1',
        'nama'=>$faker->name,
        'no_hp'=> $faker->phoneNumber,
        'berat'=> $faker->randomDigit,
        'alamat'=> $faker->address,
        'isantarjemput'=> $faker->boolean,
        'estimasi'=> $faker->date,
        'tgl_pesan'=> $faker->date,
        'tgl_selesai'=> $faker->date
        ]);
        Pesanan::insert([
            'paket_id'=>'2',
            'nama'=>$faker->name,
            'no_hp'=> $faker->phoneNumber,
            'berat'=> $faker->randomDigit,
            'alamat'=> $faker->address,
            'isantarjemput'=> $faker->boolean,
            'estimasi'=> $faker->date,
            'tgl_pesan'=> $faker->date,
            'tgl_selesai'=> $faker->date
            ]);
            Pesanan::insert([
                'paket_id'=>'3',
                'nama'=>$faker->name,
                'no_hp'=> $faker->phoneNumber,
                'berat'=> $faker->randomDigit,
                'alamat'=> $faker->address,
                'isantarjemput'=> $faker->boolean,
                'estimasi'=> $faker->date,
                'tgl_pesan'=> $faker->date,
                'tgl_selesai'=> $faker->date
                ]);
    }
    
}
