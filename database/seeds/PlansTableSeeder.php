<?php

use Illuminate\Database\Seeder;

class PlansTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('plans')->delete();
        
        \DB::table('plans')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'Growth',
                'price' => 49,
                'credits' => '5000',
                'users' => '1',
                'daily_emails' => '400',
                'campaigns' => '2',
                'created_at' => '2020-11-19 05:15:16',
                'updated_at' => '2020-11-19 08:09:37',
            ),
            1 => 
            array (
                'id' => 3,
                'title' => 'Startup',
                'price' => 150,
                'credits' => '18000',
                'users' => '4',
                'daily_emails' => '500',
                'campaigns' => '4',
                'created_at' => '2020-11-19 12:21:12',
                'updated_at' => '2020-11-19 12:21:12',
            ),
        ));
        
        
    }
}