<?php

namespace Database\Seeders;

use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $permissions = [
            'admin-dashboard',
            'admin-bidang-terkait',
            'admin-klasifikasi',
            'admin-laporan',
            'manage users'
        ];
        foreach ($permissions as $permission) {
            Permission::updateOrCreate(['name' => $permission], ['guard_name' => 'web']);
        }
        $r1 = Role::firstOrCreate(["name" => "Superadmin"]);
        $r2 = Role::firstOrCreate(["name" => "Admin"]);
        $r3 = Role::firstOrCreate(["name" => "User"]);

        $r1->givePermissionTo('manage users');
        $r1->givePermissionTo('admin-dashboard');
        $r1->givePermissionTo('admin-bidang-terkait');
        $r1->givePermissionTo('admin-klasifikasi');
        $r1->givePermissionTo('admin-laporan');

        $user = User::first();
        if ($user) {
            $user->assignRole($r1);
            $user->assignRole($r2);
            $user->assignRole($r3);
        } else {
            $this->command->warn('No user found. Please create a user to assign roles.');
        }


    }
}
