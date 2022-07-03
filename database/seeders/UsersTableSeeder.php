<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Admin 1',
                'email' => 'admin@admin.com',
                'role' => 1,
                'email_verified_at' => NULL,
                'password' => '$2y$10$g61PXv19euyoYDGtfFPShupl0zhbXnBg/K32c23Q8kWJzuTJSFoVa',
                'remember_token' => NULL,
                'created_at' => '2022-06-22 09:54:12',
                'updated_at' => '2022-06-22 09:54:12',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Admin 2',
                'email' => 'admin2@admin.com',
                'role' => 1,
                'email_verified_at' => NULL,
                'password' => '$2y$10$MxoqomzsEFB8elHrx0C13OIKWDX7tw3zyK5WB1xMilCXhHVyTFthW',
                'remember_token' => NULL,
                'created_at' => '2022-06-22 09:54:31',
                'updated_at' => '2022-06-22 09:54:31',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Kasir 1',
                'email' => 'kasir@kasir.com',
                'role' => 2,
                'email_verified_at' => NULL,
                'password' => '$2y$10$cvRil4MgQvcioHHqZZHFZek5leBjXtYcWu3ve5RaYYAgPFjphNshq',
                'remember_token' => NULL,
                'created_at' => '2022-06-22 09:55:04',
                'updated_at' => '2022-06-22 09:55:04',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Kasir 2',
                'email' => 'kasir2@kasir.com',
                'role' => 2,
                'email_verified_at' => NULL,
                'password' => '$2y$10$Kdv4dAcedjfA8017ZIXgG.j.93l8y6JQg8WHShHUNOE8cy5SVss56',
                'remember_token' => NULL,
                'created_at' => '2022-06-22 09:55:35',
                'updated_at' => '2022-06-22 09:55:35',
            ),
        ));
        
        
    }
}