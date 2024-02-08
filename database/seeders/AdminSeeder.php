<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;


class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $user= User::create([
            'name' => 'admin',
            'email' => 'admin4@gmail.com',
            'email_verified_at' => now(),
            'password' => '123',
        ]);
        $user->assignRole($adminRole);
    }
}
