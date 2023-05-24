<?php

namespace Database\Seeders;

use App\Constants\Permissions;
use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [];
        $now = now();

        foreach (Permissions::toArray() as $permission) {
            $permissions[] = [
                'name' => $permission,
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        Permission::insertOrIgnore($permissions);
    }
}
