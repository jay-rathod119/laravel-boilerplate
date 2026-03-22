<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class RoleUsersSeeder extends Seeder
{
    /**
     * Full admin + two users that may only create products (no edit/delete).
     *
     * @param  string  $password  Shared dev password for all three accounts.
     */
    public function run(string $password = 'password123'): void
    {
        User::query()->whereNull('role')->update(['role' => UserRole::Admin->value]);

        $hash = Hash::make($password);

        User::query()->updateOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin',
                'password' => $hash,
                'role' => UserRole::Admin->value,
            ],
        );

        User::query()->updateOrCreate(
            ['email' => 'products1@example.com'],
            [
                'name' => 'Product creator 1',
                'password' => $hash,
                'role' => UserRole::ProductCreator->value,
            ],
        );

        User::query()->updateOrCreate(
            ['email' => 'products2@example.com'],
            [
                'name' => 'Product creator 2',
                'password' => $hash,
                'role' => UserRole::ProductCreator->value,
            ],
        );
    }
}
