<?php

use App\CategoryProduct;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        CategoryProduct::create([
            'name' => 'Arreglos y regalos'
        ]);

        CategoryProduct::create([
            'name' => 'Librería'
        ]);
    }
}
