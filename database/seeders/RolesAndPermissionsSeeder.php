<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        
        // User permissions
        $permission_create_user = Permission::create(['name' => 'create user']);
        $permission_read_user = Permission::create(['name' => 'read user']);
        $permission_update_user = Permission::create(['name' => 'update user']);
        $permission_delete_user = Permission::create(['name' => 'delete user']);
        
        // Employee permissions
        $permission_create_employee = Permission::create(['name' => 'create employee']);
        $permission_read_employee = Permission::create(['name' => 'read employee']);
        $permission_update_employee = Permission::create(['name' => 'update employee']);
        $permission_delete_employee = Permission::create(['name' => 'delete employee']);
        
        // Fee permissions
        $permission_create_fee = Permission::create(['name' => 'create fee']);
        $permission_read_fee = Permission::create(['name' => 'read fee']);
        $permission_update_fee = Permission::create(['name' => 'update fee']);
        $permission_delete_fee = Permission::create(['name' => 'delete fee']);
        
        // Role permissions
        $permission_create_role = Permission::create(['name' => 'create role']);
        $permission_read_role = Permission::create(['name' => 'read role']);
        $permission_update_role = Permission::create(['name' => 'update role']);
        $permission_delete_role = Permission::create(['name' => 'delete role']);
        
        // Permission permissions
        $permission_create_permission = Permission::create(['name' => 'create permission']);
        $permission_read_permission = Permission::create(['name' => 'read permission']);
        $permission_update_permission = Permission::create(['name' => 'update permission']);
        $permission_delete_permission = Permission::create(['name' => 'delete permission']);
        
        // Task permissions
        $permission_complete_task = Permission::create(['name' => 'complete task']);
        $permission_create_task = Permission::create(['name' => 'create task']);
        $permission_read_task = Permission::create(['name' => 'read task']);
        $permission_update_task = Permission::create(['name' => 'update task']);
        $permission_delete_task = Permission::create(['name' => 'delete task']);
                
        // Status permissions
        $permission_create_status = Permission::create(['name' => 'create status']);
        $permission_read_status = Permission::create(['name' => 'read status']);
        $permission_update_status = Permission::create(['name' => 'update status']);
        $permission_delete_status = Permission::create(['name' => 'delete status']);

        // Roles
        $role_admin = Role::create(['name' => 'administrator', 'color' => '#FF5733']); // Rojo anaranjado
        $role_oper = Role::create(['name' => 'operator', 'color' => '#33C1FF']); // Azul claro


        // Permission for administator
        $permission_admin = [$permission_create_user, $permission_read_user, $permission_update_user, $permission_delete_user, $permission_create_employee, 
        $permission_read_employee, $permission_update_employee, $permission_delete_employee, $permission_create_fee, $permission_read_fee, $permission_update_fee, 
        $permission_delete_fee,$permission_create_role, $permission_read_role, $permission_update_role, $permission_delete_role, $permission_create_permission, 
        $permission_read_permission, $permission_update_permission, $permission_delete_permission, $permission_create_task, $permission_read_task, 
        $permission_update_task, $permission_delete_task, $permission_create_status, $permission_read_status, $permission_update_status, $permission_delete_status];

        // Permission for operator
        $permission_oper = [$permission_read_task, $permission_complete_task, $permission_update_employee];

        $role_admin->syncPermissions($permission_admin);
        $role_oper->syncPermissions($permission_oper);
    }
}
