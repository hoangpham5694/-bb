<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert(
         	[
         		[
            'id' => 1,
            'role_name' => 'SuperAdmin',


        	],
        	         	[
            'id' => 2,
            'role_name' => 'Admin',

        	],
        	[
            'id' => 3,
            'role_name' => 'Developer',

        	],
        	 
        	]);
    }
}
