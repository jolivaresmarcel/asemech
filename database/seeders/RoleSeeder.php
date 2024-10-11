<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
//use Spatie\Permission\Contracts\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $rol1 = Role::create(['name'=>'Admin']);
       $rol2 = Role::create(['name'=>'User']);
       //$rol3 = Role::create(['name'=>'Validador']);
        
       Permission::create(['name'=>'admin.ver'])->assignRole($rol1);
       Permission::create(['name'=>'admin.crear'])->assignRole($rol1);
       Permission::create(['name'=>'admin.editar'])->assignRole($rol1);
       Permission::create(['name'=>'admin.eliminar'])->assignRole($rol1);
       
       Permission::create(['name'=>'user.ver'])->syncRoles([$rol1, $rol2]);
       Permission::create(['name'=>'user.crear'])->syncRoles([$rol1, $rol2]);
       Permission::create(['name'=>'user.editar'])->syncRoles([$rol1, $rol2]);
       Permission::create(['name'=>'user.eliminar'])->syncRoles([$rol1, $rol2]);


       
    }
}
