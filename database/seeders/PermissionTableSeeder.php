<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
 
            'sections-list',
            'sections-create',
            'sections-edit',
            'sections-delete',
 
            'questions-list',
            'questions-create',
            'questions-edit',
            'questions-delete',
 
            'scores-list',
            'scores-create',
            'scores-edit',
            'scores-delete',
            'department-list',
            'department-create',
            'department-edit',
            'department-delete',
 
         ];
    
         foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
         }
    }
}
