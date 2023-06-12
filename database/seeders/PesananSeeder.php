<?php

namespace Database\Seeders;


use App\Models\Pesanan;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PesananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
		$date = Carbon::now();
        // for ($i=1; $i <= 100; $i++) {
		// 	$packagetype_id=$faker->numberBetween(1,10);
	    //     Pesanan::insert([
	    //     	'packagetype_id'=>$packagetype_id,
	    //     	'check_id'=>$date->year.$date->month.$date->day.$packagetype_id.$i,
	    //     	'name'=>$faker->name,
	    //     	'phonenumber'=> $faker->phoneNumber,
	    //     	'weight'=> $faker->numberBetween(1,10),
	    //     	'address'=> $faker->address,
	    //     	'isshuttle'=> $faker->boolean,
	    //     	'timeestimation'=> $faker->dateTimeBetween('-1 day', 'now'),
	    //     	'timeorder'=> $faker->dateTimeBetween('-4 day', '-2 day'),
	    //     	'timefinish'=> $faker->dateTimeBetween('-1 day', 'now')
	    //     ]);
        // }
        for ($i=1; $i <= 100; $i++) {
			$packagetype_id=$faker->numberBetween(1,10);
	        Pesanan::insert([
	        	'packagetype_id'=>$packagetype_id,
	        	'check_id'=>$date->year.$date->month.$date->day.$packagetype_id.$i+100,
	        	'name'=>$faker->name,
	        	'phonenumber'=> $faker->phoneNumber,
	        	'weight'=> $faker->numberBetween(1,10),
	        	'address'=> $faker->address,
	        	'isshuttle'=> $faker->boolean,
	        	'timeestimation'=> $faker->dateTimeBetween('+1 day', '+2 day'),
	        	'timeorder'=> $faker->dateTimeBetween('-2 day', '-1 day'),
	        	'timefinish'=> NULL
	        ]);
        }
    }
    
}
