<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        for ($i=1; $i <= 50 ; $i++) { 
            DB::table('suppliers')->insert([
                'nama' => $faker->company,
                'no_hp' => $faker->phoneNumber,
                'aplikasi' => $faker->randomElement(['Tokopedia','Bukalapak','Shopee','Lazada','Blibli','JD ID','Offline']),
                'alamat' => $faker->address,
                'status' => rand(0,1),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
