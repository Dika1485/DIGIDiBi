<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
class UserSeeder extends Seeder
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
            User::insert([
                'username' =>$faker->userName,
                'email' =>$faker->unique()->email,
                'email_verified_at'=>now(),
                'password' => bcrypt('user12345'),
                'nama' => $faker->name,
                'no_hp' => $faker->phoneNumber,
                'alamat' => $faker->address
            ]);
        }
        //
    }
}
