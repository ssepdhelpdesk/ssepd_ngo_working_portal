<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $allRoles = [
            'SuperAdmin',
            'Admin',
            'PEO',
            'BSSO',
            'MEO',
            'BDO',
            'Tahasildar',
            'SSSO',
            'DSSO',
            'SubCollector',
            'Collector',
            'HO',
            'BO',
            'Director',
            'Secretary',
            'Ngo',
            'INSTITUTE',
            'HEALTH_CONSULTANT',
            'TECH_OPERATOR',
            'DPM',
            'User',
        ];

        $allPermissions = Permission::pluck('id')->all();

        $rolePermissions = [
            'SuperAdmin' => $allPermissions,
            'Admin' => $allPermissions,

            'Ngo' => [
                'my-profile-access', 'my-profile-list', 'my-profile-show', 'my-profile-create', 'my-profile-edit',
                'ngo-access', 'ngo-list', 'ngo-show', 'ngo-create', 'ngo-edit',
            ],
            'DSSO' => [
                'my-profile-access', 'my-profile-list', 'my-profile-show', 'my-profile-create', 'my-profile-edit',
                'ngo-access', 'ngo-list', 'ngo-show', 'ngo-edit', 'ngo-approve-form',
            ],
            'Collector' => [
                'my-profile-access', 'my-profile-list', 'my-profile-show', 'my-profile-create', 'my-profile-edit',
                'ngo-access', 'ngo-list', 'ngo-show', 'ngo-edit', 'ngo-approve-form',
            ],
            'HO' => [
                'my-profile-access', 'my-profile-list', 'my-profile-show', 'my-profile-create', 'my-profile-edit',
                'ngo-access', 'ngo-list', 'ngo-show', 'ngo-edit', 'ngo-approve-form',
            ],
            'BO' => [
                'my-profile-access', 'my-profile-list', 'my-profile-show', 'my-profile-create', 'my-profile-edit',
                'ngo-access', 'ngo-list', 'ngo-show', 'ngo-edit', 'ngo-approve-form',
            ],
            'Director' => [
                'my-profile-access', 'my-profile-list', 'my-profile-show', 'my-profile-create', 'my-profile-edit',
                'ngo-access', 'ngo-list', 'ngo-show', 'ngo-edit', 'ngo-approve-form',
            ],
            'Secretary' => [
                'my-profile-access', 'my-profile-list', 'my-profile-show', 'my-profile-create', 'my-profile-edit',
                'ngo-access', 'ngo-list', 'ngo-show', 'ngo-edit', 'ngo-approve-form',
            ],
        ];

        foreach ($allRoles as $roleName) {
            $role = Role::firstOrCreate(['name' => $roleName]);

            if (array_key_exists($roleName, $rolePermissions)) {
                $permissions = $rolePermissions[$roleName];
                $permissionModels = Permission::whereIn('name', $permissions)->get();
                $role->syncPermissions($permissionModels);
            }
        }
    }
}
