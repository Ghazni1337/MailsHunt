<?php

use Illuminate\Database\Seeder;

class HostnamesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('hostnames')->delete();
        
        \DB::table('hostnames')->insert(array (
            0 => 
            array (
                'id' => 5,
                'fqdn' => 'empire1605706721.mailshunt.test',
                'redirect_to' => NULL,
                'force_https' => 0,
                'under_maintenance_since' => NULL,
                'website_id' => 5,
                'created_at' => '2020-11-18 13:39:10',
                'updated_at' => '2020-11-18 13:39:10',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 6,
                'fqdn' => 'doe@gmail.com',
                'redirect_to' => NULL,
                'force_https' => 0,
                'under_maintenance_since' => NULL,
                'website_id' => 5,
                'created_at' => '2020-11-18 13:39:10',
                'updated_at' => '2020-11-18 13:39:10',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 13,
                'fqdn' => 'tester1605864438.mailshunt.test',
                'redirect_to' => NULL,
                'force_https' => 0,
                'under_maintenance_since' => NULL,
                'website_id' => 9,
                'created_at' => '2020-11-20 09:27:24',
                'updated_at' => '2020-11-20 09:27:24',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 14,
                'fqdn' => 'shupel16@gmail.com',
                'redirect_to' => NULL,
                'force_https' => 0,
                'under_maintenance_since' => NULL,
                'website_id' => 9,
                'created_at' => '2020-11-20 09:27:24',
                'updated_at' => '2020-11-20 09:27:24',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 15,
                'fqdn' => 'testing1605865885.mailshunt.test',
                'redirect_to' => NULL,
                'force_https' => 0,
                'under_maintenance_since' => NULL,
                'website_id' => 10,
                'created_at' => '2020-11-20 09:52:27',
                'updated_at' => '2020-11-20 09:52:27',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 16,
                'fqdn' => 'tester@gmail.com',
                'redirect_to' => NULL,
                'force_https' => 0,
                'under_maintenance_since' => NULL,
                'website_id' => 10,
                'created_at' => '2020-11-20 09:52:28',
                'updated_at' => '2020-11-20 09:52:28',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}