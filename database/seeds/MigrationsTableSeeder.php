<?php

use Illuminate\Database\Seeder;

class MigrationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('migrations')->delete();
        
        \DB::table('migrations')->insert(array (
            0 => 
            array (
                'id' => 1,
                'migration' => '2017_01_01_000003_tenancy_websites',
                'batch' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'migration' => '2017_01_01_000005_tenancy_hostnames',
                'batch' => 1,
            ),
            2 => 
            array (
                'id' => 3,
                'migration' => '2018_04_06_000001_tenancy_websites_needs_db_host',
                'batch' => 1,
            ),
            3 => 
            array (
                'id' => 4,
                'migration' => '2014_10_12_000000_create_users_table',
                'batch' => 2,
            ),
            4 => 
            array (
                'id' => 6,
                'migration' => '2020_11_15_104854_create_admins_table',
                'batch' => 4,
            ),
            5 => 
            array (
                'id' => 7,
                'migration' => '2020_11_19_025401_create_plans_table',
                'batch' => 5,
            ),
            6 => 
            array (
                'id' => 8,
                'migration' => '2020_11_19_155006_create_users_plans_table',
                'batch' => 6,
            ),
            7 => 
            array (
                'id' => 9,
                'migration' => '2020_11_20_084243_create_codes_table',
                'batch' => 7,
            ),
            8 => 
            array (
                'id' => 10,
                'migration' => '2019_05_03_000002_create_subscriptions_table',
                'batch' => 8,
            ),
            9 => 
            array (
                'id' => 11,
                'migration' => '2019_05_03_000003_create_subscription_items_table',
                'batch' => 8,
            ),
        ));
        
        
    }
}