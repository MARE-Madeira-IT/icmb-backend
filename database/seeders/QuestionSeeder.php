<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                "content" => "What is the capital of the Philippines?",
                "type" => "session",
            ],
            [
                "content" => "What is the capital of the Philippines?",
                "type" => "session",
            ],
            [
                "content" => "What is the capital of the Philippines?",
                "type" => "session",
            ],
            [
                "content" => "What is the capital of the Philippines?",
                "type" => "session",
            ],


            [
                "content" => "How did you enjoy the poster content?",
                "type" => "poster",
            ],
            [
                "content" => "How did you enjoy the design?",
                "type" => "poster",
            ],
            [
                "content" => "How did you enjoy the oral presentation?",
                "type" => "poster",
            ],
            [
                "content" => "How did you enjoy the readability?",
                "type" => "poster",
            ],
            [
                "content" => "How did you enjoy the results?",
                "type" => "poster",
            ],
        ];

        foreach ($data as $key => $record) {
            Question::create($record);
        }
    }
}
