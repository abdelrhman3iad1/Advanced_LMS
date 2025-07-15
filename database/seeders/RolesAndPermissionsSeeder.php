<?php

namespace Database\Seeders;

use App\Enums\UserType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        $user_cases = UserType::cases();

        foreach($user_cases as $userType){
            Role::create([
                "name" => $userType->label(),
                "guard_name" => 'api',
            ]);
        }

        // Permissions
        $permissions = [
            'show_courses',
            'create_course',
            'update_course',
            'delete_course'
        ];

        foreach($permissions as $permission){
            Permission::create([
                'name' => $permission,
                'guard_name'=>'api'
            ]);
        }


        // Permissions
        $assign_roles_to_permissions = [

            'Admin' => $permissions,
            'User' => [
                'show_courses'
            ],
            'Instructor' => [
                'show_courses',
                'create_course',
                'update_course',
                'delete_course'
            ],

        ];

        foreach($assign_roles_to_permissions as $role => $permission){
            $role = Role::where('name' , $role)->first();
            if($role != null){
                $role->syncPermissions($permission);
            }
        }

    }
}
