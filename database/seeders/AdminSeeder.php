<?php

namespace Database\Seeders;
use Spatie\Permission\Models\Permission;
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
            'email' => 'admin5@gmail.com',
            'email_verified_at' => now(),
            'password' => '123',
            'image' => 'users_images\hyjJvDOQU2KJM42oBwWI2gLiXtL9Rxj5VGg08h61.png',
        ]);
        $user->assignRole($adminRole);
        $permission = Permission::create([
            'name' => 'adminPermission',
        ]);

        $user->givePermissionTo($permission);
    }
}
