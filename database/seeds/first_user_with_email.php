<?php

use Illuminate\Database\Seeder;

class first_user_with_email extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([       
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'password' => bcrypt('password123')
        ]);
    }
}
