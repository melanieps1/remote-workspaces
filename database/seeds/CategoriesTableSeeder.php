<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      
      DB::table('categories')->insert([
      	'name' => 'Coffee Shop'
      ]);
    
      DB::table('categories')->insert([
      	'name' => 'Coworking Space'
      ]);

      DB::table('categories')->insert([
      	'name' => 'School Campus'
      ]);

      DB::table('categories')->insert([
      	'name' => 'Library'
      ]);

      DB::table('categories')->insert([
      	'name' => 'Gym'
      ]);

      DB::table('categories')->insert([
      	'name' => 'Mall'
      ]);

      DB::table('categories')->insert([
      	'name' => 'Restaurant/Bar'
      ]);

      DB::table('categories')->insert([
      	'name' => 'Public Space'
      ]);

      DB::table('categories')->insert([
      	'name' => 'Hostel/Hotel'
      ]);

      DB::table('categories')->insert([
      	'name' => 'Museum'
      ]);

      DB::table('categories')->insert([
      	'name' => 'Park'
      ]);

    }
}
