<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        for ($i=1; $i <= 30 ; $i++) { 
            DB::table('barang')->insert([
                'nama' => $faker->randomElement(['Samsung','Xiaomi','Oppo','Vivo','Iphone','Realme']),
                'slug' => Str::slug($faker->name),
                'supplier_id' => rand(1,30),
                'kategori_id' => rand(1,4),
                'merk' => $faker->randomElement(['Samsung','Xiaomi','Oppo','Vivo','Iphone','Realme']),
                'tanggal_beli' => Carbon::now(),
                'harga_beli' => $faker->randomElement([2000000,2200000,2500000,2700000,3000000]),
                'harga_jual_cash' => $faker->randomElement([2000000,2200000,2500000,2700000,3000000]),
                'laba_cash' => $faker->randomElement([2000000,2200000,2500000,2700000,3000000]),
                'harga_jual_kredit' => $faker->randomElement([2000000,2200000,2500000,2700000,3000000]),
                'laba_kredit' => $faker->randomElement([2000000,2200000,2500000,2700000,3000000]),
                'ram' => $faker->randomElement([1, 2, 3, 4, 6,8,16,32]),
                'memori' => $faker->randomElement([8, 16, 32, 64, 128,256,500,1000,2000]),
                'deskripsi' => $faker->sentence(10),
                'status' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
