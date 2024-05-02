<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'Administrador',
            'email' => 'user@admin.com',
            'password' => bcrypt('123456'),
        ]);

        $company = User::create([
            'name' => 'Empresa',
            'email' => 'user@company.com',
            'password' => bcrypt('123456'),
        ]);

        $user = User::create([
            'name' => 'Usuario',
            'email' => 'user@user.com',
            'password' => bcrypt('123456'),
        ]);

        $roleAdmin = Role::all();
        $admin->roles()->attach($roleAdmin);

        $roleCompany = Role::where('roleName', 'company')->first();
        $company->roles()->attach($roleCompany);

        $roleUser = Role::where('roleName', 'user')->first();
        $user->roles()->attach($roleUser);
    }
}
