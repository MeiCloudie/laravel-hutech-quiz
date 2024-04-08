<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class RoomSeeder extends Seeder
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
                'code' => '12345',
                'current_quiz_id' => 1,
                'quiz_collection_id' => 3,
                'owner_id' => 1,
                "created_at" =>  \Carbon\Carbon::now(),
                "updated_at" => \Carbon\Carbon::now(),
            ],
            [
                'id' => 2,
                'code' => '12346',
                'current_quiz_id' => 2,
                'quiz_collection_id' => 3,
                'owner_id' => 2,
                "created_at" =>  \Carbon\Carbon::now(),
                "updated_at" => \Carbon\Carbon::now(),
            ],
        ];
        DB::table('rooms')->truncate();
        DB::table('rooms')->insert($data);
    }
}
