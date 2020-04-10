<?php

namespace App\Http\Controllers;

use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;



//admin Roles
$AdminRole = Role::create(['name' => 'admin']);
$AdminPerms = Permission::create(['name' => 'Add User', 'name' => 'Edit User' ,'name' => 'Granting access', 'name' => 'Delete User' , 'name' => 'view users','name' => 'Create Post' ,'name' => 'Edit Post','name' => 'Read Posts' , 'name' => 'Delete Post' , 'name' => 'Create Lottery' , 'name' => 'Edit Lottery' , 'name' => 'Read Lottery','name' => 'Delete Lottery' , 'name' => 'Edit Site']);



$managerRole = Role::create(['name' => 'manager']);
$managerPerms = Permission::create(['name' => 'view users','name' => 'Create Post' ,'name' => 'Edit Post','name' => 'Read Posts' , 'name' => 'Delete Post' , 'name' => 'Create Lottery' , 'name' => 'Edit Lottery' , 'name' => 'Read Lottery','name' => 'Delete Lottery']);
//Assignee roles to perms
$AdminRole->givePermissionTo($AdminPerms);
$managerRole->givePermissionTo($managerPerms);

