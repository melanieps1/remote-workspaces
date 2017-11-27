<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
    	DB::table('users')->insert([
        'first_name' => 'Melanie',
        'last_name' => 'Stoeckle',
        'username' => 'melanieps1',
        'email' => 'mpstoeckle@gmail.com',
        'password' => bcrypt('melanie123'),
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
      ]);

      DB::table('users')->insert([
        'first_name' => 'Sam',
        'last_name' => 'Polzin',
        'username' => 'spolzin',
        'email' => 'spolzin@gmail.com',
        'password' => bcrypt('spolzin123'),
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
      ]);

      DB::table('users')->insert([
        'first_name' => 'Theresa',
        'last_name' => 'Simcic',
        'username' => 'tsimcic',
        'email' => 'tsimcic@gmail.com',
        'password' => bcrypt('tsimcic123'),
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
      ]);

      DB::table('users')->insert([
        'first_name' => 'Hannah',
        'last_name' => 'Simoff',
        'username' => 'hsimoff',
        'email' => 'hsimoff@gmail.com',
        'password' => bcrypt('hsimoff123'),
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
      ]);

    }
}
