<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Carbon\Carbon;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $SuperAdminUser = User::create([
            'name' => 'Waris Patel', 
            'email' => 'super_admin@gmail.com',
            'user_id' => 'suraj7196',
            'password' => bcrypt('123456'),
            'email_verified_at' => Carbon::now('Asia/Kolkata'),
        ]);

        $AdminUser = User::create([
            'name' => 'Suraj Prasim Patel', 
            'email' => 'admin@gmail.com',
            'user_id' => 'admin7196',
            'password' => bcrypt('123456'),
            'email_verified_at' => Carbon::now('Asia/Kolkata'),
        ]);

        $role_super_admin = Role::firstOrCreate(['name' => 'SuperAdmin']);
        $role_admin = Role::firstOrCreate(['name' => 'Admin']);

        $SuperAdminUser->assignRole('SuperAdmin');
        $AdminUser->assignRole('Admin');
    }
}