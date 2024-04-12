<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class QuizSeeder extends Seeder
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
                'content' => '1 + 1 = ?',
                'explaination' => 'Phép cộng',
                "created_at" =>  \Carbon\Carbon::now(),
                "updated_at" => \Carbon\Carbon::now(),
            ],
            [
                'id' => 2,
                'content' => '9 x 2 = ?',
                'explaination' => 'Phép nhân',
                "created_at" =>  \Carbon\Carbon::now(),
                "updated_at" => \Carbon\Carbon::now(),
            ],
            [
                'id' => 3,
                'content' => '1 + 2 = ?',
                'explaination' => 'Phép cộng',
                "created_at" =>  \Carbon\Carbon::now(),
                "updated_at" => \Carbon\Carbon::now(),
            ],
            
            [
                'id' => 4,
                'content' => '1 + 3 = ?',
                'explaination' => 'Phép cộng',
                "created_at" =>  \Carbon\Carbon::now(),
                "updated_at" => \Carbon\Carbon::now(),
            ],
            [
                'id' => 5,
                'content' => '9 x 3 = ?',
                'explaination' => 'Phép nhân',
                "created_at" =>  \Carbon\Carbon::now(),
                "updated_at" => \Carbon\Carbon::now(),
            ],
            [
                'id' => 6,
                'content' => '9 x 4 = ?',
                'explaination' => 'Phép nhân',
                "created_at" =>  \Carbon\Carbon::now(),
                "updated_at" => \Carbon\Carbon::now(),
            ],
        ];
        DB::table('quizzes')->truncate();
        DB::table('quizzes')->insert($data);
    }
}
