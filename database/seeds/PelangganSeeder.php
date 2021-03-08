<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class PelangganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $faker = Faker::create('id_ID');

        // for ($i=1; $i <= 100 ; $i++) { 
            DB::table('pelanggan')->insert([
                // 'user_id' =>rand(6,20),
                'nama' => 'Kirun',
                'slug' => Str::slug('kirun'),
                'nik' => $faker->ean8,
                'no_hp' => $faker->phoneNumber,
                'jk' => 'Laki-laki',
                'foto' => '',
                'alamat' => $faker->address,
                'status' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        // }
    }
}
