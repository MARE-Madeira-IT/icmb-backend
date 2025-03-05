<?php

namespace Database\Seeders;

use App\Models\Sponsor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SponsorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Sponsor::create([
            'name' => 'MARE',
            'logo' => '/images/sponsors/mare.png',
            'category' => 'organization'
        ]);

        Sponsor::create([
            'name' => 'SSMB',
            'logo' => '/images/sponsors/ssmb.png',
            'category' => 'organization'
        ]);


        Sponsor::create([
            'name' => 'MARE',
            'logo' => '/images/sponsors/mare.png',
            'category' => 'lionfish'
        ]);

        Sponsor::create([
            'name' => 'SSMB',
            'logo' => '/images/sponsors/ssmb.png',
            'category' => 'blue crab'
        ]);

        Sponsor::create([
            'name' => 'SSMB',
            'logo' => '/images/sponsors/ssmb.png',
            'category' => 'red algae'
        ]);
    }
}
