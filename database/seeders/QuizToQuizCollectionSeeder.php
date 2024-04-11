<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class QuizToQuizCollectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Schema::disableForeignKeyConstraints();
        $data = [
            [
                'quiz_id' => 1,
                'quiz_collection_id' => 3,
            ],
            [
                'quiz_id' => 2,
                'quiz_collection_id' => 4,
            ],
            [
                'quiz_id' => 3,
                'quiz_collection_id' => 3,
            ],
            [
                'quiz_id' => 4,
                'quiz_collection_id' => 3,
            ],
        ];
        DB::table('quiz_to_quiz_collections')->truncate();
        DB::table('quiz_to_quiz_collections')->insert($data);
    }
}
