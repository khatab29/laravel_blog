<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Validator;
use App\Mail\GeneratePassword;
use App\Admin;


class AdminsCreate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:create {name?} {email?} {--g|generat : generate random pasword}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create New Admin';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(Faker $faker)
    {

        $name = $this->argument('name') ?? $this->ask('what is your name ?');
        $email = $this->argument('email') ?? $this->ask('what is your email ?');
        $this->option('generat')? $password=$faker->password(8) : $password=$this->ask('what is your password ?');
        $validator = Validator::make([
            'name' => $name,
            'email' => $email,
            'password' => $password,
        ], [
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:admins'],
            'password' => ['required', 'min:8'],
        ]);
        if ($validator->fails()) {
            $this->info('Admin was not created. See error messages below:');
            foreach ($validator->errors()->all() as $error) {
                $this->error($error);
            }
            return 1;
        }
        if ($this->confirm('are you sure you want to add '. $name . 'as admin')) {
            $admin = Admin::create([
            'name' =>  $name ,
            'email' => $email,
            'password' => Hash::make($password)
        ]);
            if (!$admin) {
                $this->error('error opration failed');
            }
            Mail::to($admin->email)->send(new GeneratePassword($admin));
            $this->info('New Admin ' .$admin->name .' Was Created Successfully');
            if ($this->option('verbose')) {
                $headers = ['Name', 'Email', 'password'];
                $data = [[$name,$email,$password]];
                $this->table($headers, $data);
            }

        }


    }






}
