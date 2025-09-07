<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            RoleAndPermissionSeeder::class,
            PlaceSeeder::class,
        ]);

        $user = User::factory()->create([
            'name' => 'Administrador',
            'email' => 'admin@admin.com',
            'password' => 'admin',
            'identifier' => '12345678',
            'phone_number' => '12345678',
            'identity_card' => '12345678',
            'date_of_birth' => '2000-01-01',
        ]);
        $user->assignRole('Admin');
    }
}
