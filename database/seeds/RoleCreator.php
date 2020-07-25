<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleCreator extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //permissions
        $permissions = array('Add User','Edit User','Granting access','Delete User','Update User Setting','view users', 'Create Post','Edit Post','Read Posts','Delete Post','Create Lottery','Edit Lottery','Read Lottery','Delete Lottery','Show Lottery Details','Update Lottery','Add Person To Lottery','Edit Site','Show Joined Lottery','Join Public Lottery');
        //create permissions
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
        //role permissions
        $ManagerPerms = array('Create Post','Edit Post','Read Posts','Delete Post','Create Lottery','Edit Lottery','Read Lottery','Delete Lottery','Update User Setting','Add Person To Lottery');
        $LotteryPerms = array('Show Lottery Details','Update Lottery','Add Person To Lottery','Update User Setting');
        $UserPerms = array('Show Joined Lottery','Join Public Lottery','Update User Setting');


        //Roles
        $AdminRole = Role::create(['name' => 'admin']);
        $managerRole = Role::create(['name' => 'manager']);
        $LotteryAdminRole = Role::create(['name' => 'lotteryadmin']);
        $UserRole = Role::create(['name' => 'user']);
//Assignee roles to perms
        $AdminRole->givePermissionTo($permissions);
        $managerRole->givePermissionTo($ManagerPerms);
        $LotteryAdminRole->givePermissionTo($LotteryPerms);
        $UserRole->givePermissionTo($UserPerms);
    }
}
