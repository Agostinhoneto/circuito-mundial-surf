<?php

namespace Database\Seeders;

use App\Models\Onda;
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

       Onda::create([
            'id' => 1,
            'bateria_id' => 1,
            'surfista_id' => 1,
            'created_at' => now(),
        ]);


    }
}
