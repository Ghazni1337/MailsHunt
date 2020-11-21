<?php

use Illuminate\Database\Seeder;

class WebsitesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('websites')->delete();
        
        \DB::table('websites')->insert(array (
            0 => 
            array (
                'id' => 5,
                'uuid' => '820ec7fbf22146cabf827b765464c348',
                'created_at' => '2020-11-18 13:38:43',
                'updated_at' => '2020-11-18 13:38:43',
                'deleted_at' => NULL,
                'managed_by_database_connection' => NULL,
            ),
            1 => 
            array (
                'id' => 9,
                'uuid' => 'fa2359c9aee041b6b1bac32bf0290950',
                'created_at' => '2020-11-20 09:27:18',
                'updated_at' => '2020-11-20 09:27:18',
                'deleted_at' => NULL,
                'managed_by_database_connection' => NULL,
            ),
            2 => 
            array (
                'id' => 10,
                'uuid' => '1687bf9e5ca94e76bf3386c371954877',
                'created_at' => '2020-11-20 09:51:30',
                'updated_at' => '2020-11-20 09:51:30',
                'deleted_at' => NULL,
                'managed_by_database_connection' => NULL,
            ),
        ));
        
        
    }
}