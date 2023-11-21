<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NotasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('notas')->insert([
            'onda' => 1,
            'notaParcial1' => 7,
            'notaParcial2' => 6,
            'notaParcial3' => 5,
        ]);
    }
}
