<?php

namespace Database\Seeders;

use App\Models\Calendar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CalendarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                "title" => "Registration desk.",
                "date" => "2025-10-07", "from" => "2025-10-07 07:30", "to" => "2025-10-07 08:40",
                "room" => "Lobby",
            ],
            [
                "title" => "Opening Remarks",
                "date" => "2025-10-07", "from" => "2025-10-07 08:45", "to" => "2025-10-07 09:30",
                "room" => "Sunrise Auditorium",
            ],
            [
                "title" => "Keynote: A./Prof. Katie Dafforn",
                "date" => "2025-10-07", "from" => "2025-10-07 09:30", "to" => "2025-10-07 10:15",
                "room" => "Sunrise Auditorium",
            ],
            [
                "title" => "Biology & Ecology of Marine Bioinvasions I",
                "date" => "2025-10-07", "from" => "2025-10-07 10:15", "to" => "2025-10-07 12:00",
                "room" => "Sunset I",
            ],
            [
                "title" => "eDNA for Detection of Invasive Species",
                "date" => "2025-10-07", "from" => "2025-10-07 10:15", "to" => "2025-10-07 12:00",
                "room" => "Sunset II",
            ],
            [
                "title" => "Understanding, Managing, and Paying for Invasive Species I",
                "date" => "2025-10-07", "from" => "2025-10-07 10:15", "to" => "2025-10-07 12:00",
                "room" => "Sunset II",
            ],


            [
                "title" => "Announcements",
                "date" => "2025-10-08", "from" => "2025-10-08 08:45", "to" => "2025-10-08 09:30",
                "room" => "Sunrise Auditorium",
            ],
            [
                "title" => "Keynote: Julie Lockwood",
                "date" => "2025-10-08", "from" => "2025-10-08 09:30", "to" => "2025-10-08 10:15",
                "room" => "Sunrise Auditorium",
            ],
            [
                "title" => "Ship-borne Bioinvasions: Ballast",
                "date" => "2025-10-08", "from" => "2025-10-08 10:15", "to" => "2025-10-08 12:00",
                "room" => "Sunset I",
            ],
            [
                "title" => "Impact of Marine Debris on Invasive Species Spread I",
                "date" => "2025-10-08", "from" => "2025-10-08 10:15", "to" => "2025-10-08 12:00",
                "room" => "Sunset II",
            ],
            [
                "title" => "Principles, Patterns and Contrasts of Bioinvasions Across Realms I",
                "date" => "2025-10-08", "from" => "2025-10-08 10:15", "to" => "2025-10-08 12:00",
                "room" => "Sunset II",
            ],




            [
                "title" => "Announcements",
                "date" => "2025-10-09", "from" => "2025-10-09 08:45", "to" => "2025-10-09 09:30",
                "room" => "Sunrise Auditorium",
            ],
            [
                "title" => "Keynote: Julie Lockwood",
                "date" => "2025-10-09", "from" => "2025-10-09 09:30", "to" => "2025-10-09 10:15",
                "room" => "Sunrise Auditorium",
            ],
            [
                "title" => "Ship-borne Bioinvasions: Biofouling II",
                "date" => "2025-10-09", "from" => "2025-10-09 10:15", "to" => "2025-10-09 12:00",
                "room" => "Sunset I",
            ],
            [
                "title" => "Comparison of Sampling Methods for Bioinvasions Detection",
                "date" => "2025-10-09", "from" => "2025-10-09 10:15", "to" => "2025-10-09 12:00",
                "room" => "Sunset II",
            ],
            [
                "title" => "Principles, Patterns and Contrasts of Bioinvasions Across Realms II",
                "date" => "2025-10-09", "from" => "2025-10-09 10:15", "to" => "2025-10-09 12:00",
                "room" => "Sunset II",
            ],
        ];

        foreach ($data as $key => $record) {
            Calendar::create($record);
        }
    }
}
