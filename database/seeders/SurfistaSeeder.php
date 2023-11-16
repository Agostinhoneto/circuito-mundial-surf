<?php

namespace Database\Seeders;

use App\Models\Surfista;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SurfistaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Surfista::create([
            'numero' => 1,
            'nome' => 'John Doe',
            'pais' => 'Estados Unidos',
        ]);

        Surfista::create([
            'numero' => 2,
            'nome' => 'Jane Doe',
            'pais' => 'Estados Unidos', 
        ]);
    }
}
