<?php

namespace Database\Seeders;

use GuzzleHttp\Promise\Create;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;
use App\Models\User;

class Laratrust extends Seeder
{
    public function run(): void
    {
        //
        Role::create(['name' => 'super admin']);
        Role::create(['name' => 'admin']);

        Permission::create(['name' => 'edit user']);
        Permission::create(['name'  => 'view user']);

        $admin = User::find(1);
        $admin->addRole('super admin');
        $admin->givePermissions(['edit user','view user']);

    }
}
