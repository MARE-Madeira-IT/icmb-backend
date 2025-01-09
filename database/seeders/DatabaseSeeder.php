<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'User 1',
            'email' => 'test@example.com',
            'role' => 'admin',
            'password' => Hash::make("secret"),
        ]);

        User::factory()->create([
            'name' => 'User 2',
            'email' => 'test2@example.com',
            'role' => 'admin',
            'password' => Hash::make("secret"),
        ]);

        $this->call([
            CalendarSeeder::class,
            QuestionSeeder::class,
        ]);
    }
}
