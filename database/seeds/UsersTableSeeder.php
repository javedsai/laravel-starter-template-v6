<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
        	'role_id' => '1',
        	'name' => 'Javed Sai',
        	'username' => 'admin',
        	'email' => 'javedsai@gmail.com',
        	'password' => bcrypt('test123'),
        ]);

        DB::table('users')->insert([
        	'role_id' => '2',
        	'name' => 'Amaan Sai',
        	'username' => 'author',
        	'email' => 'amaan@gmail.com',
        	'password' => bcrypt('amaan123'),
        ]);
    }
}
