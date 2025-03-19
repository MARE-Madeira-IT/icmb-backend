<?php

namespace Database\Seeders;

use App\Models\MediaResource;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MediaResourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MediaResource::factory()->count(75)->create();
    }
}
