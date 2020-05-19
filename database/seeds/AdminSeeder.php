<?php
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' =>'password',
        ]);

        DB::table('admins')->insert([
            'name' => 'super-admin',
            'email' => 'super-admin@gmail.com',
            'password' =>Hash::make('passsword'),
        ]);
        
    }
}
