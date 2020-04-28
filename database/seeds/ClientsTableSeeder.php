<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clients')->insert([
        	'client_name' => 'Venus Star Construction',
        	'contact_person' => 'Paul',
        	'contact_no' => '04 2868290',
        	'address' => 'PB No. 120035, Dubai, UAE
Fax: 04 286 8291
www.venusstarcon.com'
        ]);

        DB::table('clients')->insert([
        	'client_name' => 'Helpers',
        	'contact_person' => 'Mr. Lakshmi',
        	'contact_no' => '04-3983626',
        	'address' => 'PB No. 120035, Dubai, UAE \n Fax: 04 286 8291 \n
www.venusstarcon.com'
        ]);
    }
}
