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
            'name' => 'Admin',
            'email' => 'test@example.com',
            'role' => 'PhD student',
            'institution' => 'MARE Madeira',
            'password' => Hash::make("secret"),
        ]);

        User::factory()->create([
            'name' => 'Lisa Drake',
            'email' => 'lisa@example.com',
            'role' => 'Americas Manager',
            'institution' => 'Marine Field Services & Monitoring at SGS',
            'password' => Hash::make("secret"),
        ]);

        User::factory()->create([
            'name' => 'Ross Cuthbert',
            'email' => 'ross@example.com',
            'role' => 'Leverhulme Research Fellow ',
            'institution' => "Queen's University Belfast",
            'password' => Hash::make("secret"),
        ]);

        User::factory()->create([
            'name' => 'Amy Freestone',
            'email' => 'amy@example.com',
            'role' => 'Principal Investigator',
            'institution' => "Smithsonian Environmental Research Center",
            'password' => Hash::make("secret"),
        ]);

        User::factory()->create([
            'name' => 'Ana Cristina Cardoso',
            'email' => 'ana@example.com',
            'role' => 'Scientific Officer',
            'institution' => 'European Commission Joint Research Centre',
            'password' => Hash::make("secret"),
        ]);

        User::factory()->create([
            'name' => 'Taeko Kimura',
            'email' => 'taeko@example.com',
            'role' => 'Professor',
            'institution' => 'Mie University',
            'password' => Hash::make("secret"),
        ]);

        User::factory()->create([
            'name' => 'Graeme Inglis',
            'email' => 'graeme@example.com',
            'role' => 'Chief Science Advisor',
            'institution' => 'National Institute of Water & Atmospheric Research',
            'password' => Hash::make("secret"),
        ]);

        $this->call([
            CalendarSeeder::class,
            QuestionSeeder::class,
            SponsorSeeder::class,
            FaqSeeder::class,
            SpeakerSeeder::class,
        ]);
    }
}
