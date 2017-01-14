<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('users')->insert(
         	[
         		[
            'username' => 'superadmin',
            'name' => 'Hoàng',
            'password' => bcrypt('12345'),
   
            'created_at' => new DateTime(),

        	],
        	         	[
            'username' => 'hoang',
            'name' => 'Minh Hoàng',
            'password' => bcrypt('12345'),
  
            'created_at' => new DateTime(),

        	],
        	 
        	]);
    }
}
