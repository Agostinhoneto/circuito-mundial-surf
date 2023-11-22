<?php

namespace Database\Seeders;

use App\Models\Bateria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BateriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Bateria::create([
            'id' => 1,
            'surfista1' => 1,
            'surfista2' => 2,
            'created_at' => now(),
        ]);


    }
}
