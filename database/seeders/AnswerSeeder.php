<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AnswerSeeder extends Seeder
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
                'id' => 1,
                'content' => '1',
                'is_correct' => false,
                'quiz_id' => 1,
                "created_at" =>  \Carbon\Carbon::now(),
                "updated_at" => \Carbon\Carbon::now(),
            ],
            [
                'id' => 2,
                'content' => '2',
                'is_correct' => true,
                'quiz_id' => 1,
                "created_at" =>  \Carbon\Carbon::now(),
                "updated_at" => \Carbon\Carbon::now(),
            ],

            [
                'id' => 3,
                'content' => '9',
                'is_correct' => false,
                'quiz_id' => 2,
                "created_at" =>  \Carbon\Carbon::now(),
                "updated_at" => \Carbon\Carbon::now(),
            ],
            [
                'id' => 4,
                'content' => '18',
                'is_correct' => true,
                'quiz_id' => 2,
                "created_at" =>  \Carbon\Carbon::now(),
                "updated_at" => \Carbon\Carbon::now(),
            ],

            [
                'id' => 5,
                'content' => '3',
                'is_correct' => true,
                'quiz_id' => 3,
                "created_at" =>  \Carbon\Carbon::now(),
                "updated_at" => \Carbon\Carbon::now(),
            ],
            [
                'id' => 6,
                'content' => '4',
                'is_correct' => false,
                'quiz_id' => 3,
                "created_at" =>  \Carbon\Carbon::now(),
                "updated_at" => \Carbon\Carbon::now(),
            ],
            
            [
                'id' => 7,
                'content' => '3',
                'is_correct' => false,
                'quiz_id' => 4,
                "created_at" =>  \Carbon\Carbon::now(),
                "updated_at" => \Carbon\Carbon::now(),
            ],
            [
                'id' => 8,
                'content' => '4',
                'is_correct' => true,
                'quiz_id' => 4,
                "created_at" =>  \Carbon\Carbon::now(),
                "updated_at" => \Carbon\Carbon::now(),
            ],

            [
                'id' => 9,
                'content' => '27',
                'is_correct' => false,
                'quiz_id' => 5,
                "created_at" =>  \Carbon\Carbon::now(),
                "updated_at" => \Carbon\Carbon::now(),
            ],
            [
                'id' => 10,
                'content' => '28',
                'is_correct' => true,
                'quiz_id' => 5,
                "created_at" =>  \Carbon\Carbon::now(),
                "updated_at" => \Carbon\Carbon::now(),
            ],

            [
                'id' => 11,
                'content' => '36',
                'is_correct' => true,
                'quiz_id' => 6,
                "created_at" =>  \Carbon\Carbon::now(),
                "updated_at" => \Carbon\Carbon::now(),
            ],
            [
                'id' => 12,
                'content' => '35',
                'is_correct' => false,
                'quiz_id' => 6,
                "created_at" =>  \Carbon\Carbon::now(),
                "updated_at" => \Carbon\Carbon::now(),
            ],
            [
                'id' => 13,
                'content' => '34',
                'is_correct' => false,
                'quiz_id' => 6,
                "created_at" =>  \Carbon\Carbon::now(),
                "updated_at" => \Carbon\Carbon::now(),
            ],
            [
                'id' => 14,
                'content' => '33',
                'is_correct' => false,
                'quiz_id' => 6,
                "created_at" =>  \Carbon\Carbon::now(),
                "updated_at" => \Carbon\Carbon::now(),
            ],
        ];
        DB::table('answers')->truncate();
        DB::table('answers')->insert($data);
    }
}
