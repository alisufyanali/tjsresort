<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UsersTableSeeder extends Seeder
{
    private $permissions = [
        'role-list',
        'role-create',
        'role-edit',
        'role-delete',
        'location-list',
        'location-create',
        'location-edit',
        'location-delete'
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create roles
        $adminRole = Role::create(['name' => 'admin']);
        $employeeRole = Role::create(['name' => 'employee']);
        $memberRole = Role::create(['name' => 'member']);

        // Create permissions and assign them to roles
        foreach ($this->permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Create sample users and assign roles
        $adminUser = User::create([
            'name' => 'Admin User',
            'user_type' => 'admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('admin123'),
        ]);
        $adminUser->assignRole($adminRole);

        $employeeUser = User::create([
            'name' => 'Employee User',
            'user_type' => 'emp',
            'email' => 'employee@example.com',
            'password' => bcrypt('emp123'),
        ]);
        $employeeUser->assignRole($employeeRole);

        $memberUser = User::create([
            'name' => 'Member User',
            'user_type' => 'member',
            'email' => 'member@example.com',
            'password' => bcrypt('member123'),
        ]);
        $memberUser->assignRole($memberRole);
    }
}
