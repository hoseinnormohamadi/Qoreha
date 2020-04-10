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
        //admin Roles
        $AdminRole = Role::create(['name' => 'admin']);
        $AdminPerms = array('Add User','Edit User','Granting access','Delete User','view users', 'Create Post','Edit Post','Read Posts','Delete Post','Create Lottery','Edit Lottery','Read Lottery','Delete Lottery','Edit Site');
        foreach ($AdminPerms as $adminPerm) {
            $AdminPerms = Permission::create(['name' => $adminPerm]);
        }
        $managerRole = Role::create(['name' => 'manager']);
        $ManagerPerms = array('view users','Create Post','Edit Post','Read Posts','Delete Post','Create Lottery','Edit Lottery','Read Lottery','Delete Lottery');
//Assignee roles to perms
        $AdminRole->givePermissionTo($AdminPerms);
        $managerRole->givePermissionTo($ManagerPerms);
    }
}
