<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Usuario']);

        Permission::create(['name' => 'admin'])->syncRoles([$role1]);
        Permission::create(['name' => 'user'])->syncRoles([$role1, $role2]);


        Permission::create(['name' => 'home'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'persona.list'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'persona.formEdit'])->syncRoles([$role1]);
        Permission::create(['name' => 'persona.form'])->syncRoles([$role1]);
        Permission::create(['name' => 'persona.delete'])->syncRoles([$role1]);
        Permission::create(['name' => 'persona.create'])->syncRoles([$role1]);
    }
}
