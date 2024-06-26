<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Record;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            FacultySeeder::class,
            UserSeeder::class,
            QuizCollectionSeeder::class,
            QuizSeeder::class,
            AnswerSeeder::class,
            QuizToQuizCollectionSeeder::class,
            RoomSeeder::class,
            RecordSeeder::class,
        ]);
    }
}
