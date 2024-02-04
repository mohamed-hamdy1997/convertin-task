<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Enums\AUserType;
use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin'),
            'type' => AUserType::ADMIN,
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);

        User::withoutEvents(function () {
            User::factory()->count(10000)->create();
        });
        UserFactory::setType(AUserType::ADMIN);

        User::withoutEvents(function () {
            User::factory()->count(100)->create();
        });
    }
}
