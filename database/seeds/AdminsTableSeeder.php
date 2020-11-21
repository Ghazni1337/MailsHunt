<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('admins')->delete();
        
        \DB::table('admins')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'MailsHunt Admin',
                'email' => 'admin@mailshunt.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$WB4pMjxwmxP5Ffb5/5erF.N.1G9DZXit6F0lQ3L8ePrcntgmAGwvC',
                'remember_token' => NULL,
                'created_at' => '2020-11-15 15:16:04',
                'updated_at' => '2020-11-15 15:16:04',
            ),
        ));
        
        
    }
}