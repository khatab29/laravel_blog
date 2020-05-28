<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [            
            [ 'name' => 'user', 'email' => 'user@user.com', 'password' => Hash::make('user1234')]
        ];
    
        foreach ($users as $user) {
            App\User::create($user);
        }
        
    }





}
