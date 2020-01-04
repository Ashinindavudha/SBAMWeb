<?php

use Illuminate\Database\Seeder;
use App\Model\admin\admin;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = admin::create([
        	'name' => 'Super Admin',
        	'email' => 'superadmin@gmail.com',
        	'password' => bcrypt('12345678'),
        	'phone' => '09257031942',
        	'status' => 1
        ]);


    }
}
