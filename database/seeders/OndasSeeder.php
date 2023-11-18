<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OndasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //DB::table('ondas')->truncate();

        DB::table('ondas')->insert([
            'id' => 1,
            'bateria_id' => 1,
            'surfista_id' => 1,
        ]);
    }
}
