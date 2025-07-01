<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Hash;
class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::create([
	        'name' => 'John Due',
	        'email' => 'superadmin@gmail.com',
	        'password' => Hash::make('admin@123'), // change in production
	        'role' => 'SuperAdmin',
    	]);
    }
}
