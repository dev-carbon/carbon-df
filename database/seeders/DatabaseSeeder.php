<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Profile;
use App\Models\Speciality;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        Speciality::create(['name' => fake()->text(21)]);
        Speciality::create(['name' => fake()->text(21)]);
        Speciality::create(['name' => fake()->text(21)]);
        Speciality::create(['name' => fake()->text(21)]);
        Speciality::create(['name' => fake()->text(21)]);

        // Create permissions
        Permission::create(['name' => 'create permissions']);
        Permission::create(['name' => 'view permissions']);
        Permission::create(['name' => 'edit permissions']);
        Permission::create(['name' => 'delete permissions']);

        Permission::create(['name' => 'create roles']);
        Permission::create(['name' => 'view roles']);
        Permission::create(['name' => 'edit roles']);
        Permission::create(['name' => 'delete roles']);

        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'view users']);
        Permission::create(['name' => 'edit users']);
        Permission::create(['name' => 'delete users']);

        Permission::create(['name' => 'create restaurants']);
        Permission::create(['name' => 'edit restaurants']);
        Permission::create(['name' => 'delete restaurants']);

        // Create roles and assign existing permissions
        $adminRole = Role::create(['name' => 'admin']);
        $managerRole = Role::create(['name' => 'manager']);
        $ownerRole = Role::create(['name' => 'owner']);
        $userRole = Role::create(['name' => 'user']);
    
        // Create users
        User::create([
            'name' => 'dev-carbon',
            'email' => 'dev-carbon@mail.com',
            'password' => Hash::make('0000'),
        ])->assignRole($adminRole)->profile()->create(['avatar' => 'web/user-avatar.png']);
        
        User::create([
            'name' => 'manager-carbon',
            'email' => 'manager-carbon@mail.com',
            'password' => Hash::make('0000'),
        ])->assignRole($managerRole)->profile()->create(['avatar' => 'web/user-avatar.png']);
        
        User::create([
            'name' => 'owner-carbon',
            'email' => 'owner-carbon@mail.com',
            'password' => Hash::make('0000'),
        ])->assignRole($ownerRole)->profile()->create(['avatar' => 'web/user-avatar.png']);

        User::create([
            'name' => 'user-carbon',
            'email' => 'user-carbon@mail.com',
            'password' => Hash::make('0000'),
        ])->assignRole($userRole)->profile()->create(['avatar' => 'web/user-avatar.png']);

        // Run restaurant seeder
        $this->call([
            RestaurantSeeder::class
        ]);
    }
}
