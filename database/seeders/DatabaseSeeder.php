<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $admin = User::factory()->create([
            'name' => 'admin',
            'password' => Hash::make('123123123'),
            'remember_token' => Str::random(10),
        ]);

        $roles = [
            ['role' => 'admin'],
            ['role' => 'buyer'],
            ['role' => 'seller'],
            ['role' => 'support'],
        ];

        foreach ($roles as $roleData) {
            Role::firstOrCreate([
                'role' => $roleData['role'],
            ]);
        }

        $adminRole = Role::where('role', 'admin')->first();

        $admin->roles()->syncWithoutDetaching([$adminRole->id]);
    }
}
