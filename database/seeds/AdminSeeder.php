<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admins = [
            [ 'name' => 'admin', 'email' => 'admin@admin.com', 'password' => Hash::make('password')]
        ];
    
        foreach ($admins as $admin) {
            App\Admin::create($admin);
        }
    }







    
}
