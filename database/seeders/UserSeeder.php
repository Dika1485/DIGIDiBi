<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        User::insert([
            'username' => 'imnotdika',
            'email' => 'ptiandika@gmail.com',
            'password' => Hash::make('imnotdika1485'),
            'role' => 'Admin',
            'laundryname' => 'imnotdika',
            'phonenumber' => '082226536669',
            'address' => 'Cilacap',
            'deadline' => NULL
        ]);
        User::insert([
            'username' => 'mamat',
            'email' => 'rochmat@gmail.com',
            'password' => Hash::make('mamatgenshinnumpak'),
            'role' => 'User',
            'laundryname' => 'mamat Laundry',
            'phonenumber' => '0895417773463',
            'address' => 'Purbalingga',
            'deadline' => Carbon::now()->addMonths(1)
        ]);
        User::insert([
            'username' => 'abimanyu',
            'email' => 'abee@gmail.com',
            'password' => Hash::make('abimanyuputraarjuna'),
            'role' => 'User',
            'laundryname' => 'abi Laundry',
            'phonenumber' => '082220638678',
            'address' => 'Banjarnegara',
            'deadline' => Carbon::now()->addMonths(1)
        ]);
        for ($i=1; $i <= 10; $i++) { 
            User::insert([
                'username' =>$faker->userName,
                'email' =>$faker->unique()->email,
                'password' => Hash::make('user12345'),
                'role' => 'User',
                'laundryname' => $faker->name,
                'phonenumber' => $faker->phoneNumber,
                'address' => $faker->address,
                'deadline' => $faker->dateTimeBetween('now', '+1 month')
            ]);
        }
        //
    }
}
