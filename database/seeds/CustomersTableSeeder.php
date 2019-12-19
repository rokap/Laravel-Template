<?php

use App\Models\Customer;
use Illuminate\Database\Seeder;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    $faker = Faker\Factory::create();
	
	    for($i = 0; $i < 1000; $i++) {
		
		    $customer = Customer::create([
		    	'company' => $faker->company,
		    	'first_name' => $faker->firstName,
		    	'middle_name' => $faker->firstName,
		    	'last_name' => $faker->lastName,
		    	'billing_address_1' => $faker->streetAddress,
		    	'billing_address_2' => $faker->secondaryAddress,
		    	'billing_city' => $faker->city,
		    	'billing_state' => $faker->state,
		    	'billing_zip' => $faker->postcode,
		    	'shipping_address_1' => $faker->streetAddress,
		    	'shipping_address_2' => $faker->secondaryAddress,
		    	'shipping_city' => $faker->city,
		    	'shipping_state' => $faker->state,
		    	'shipping_zip' => $faker->postcode,
		    	'phone' => $faker->phoneNumber,
		    	'fax' => $faker->phoneNumber,
		    	'email' => $faker->safeEmail,
		    ]);
	    }
    }
}
