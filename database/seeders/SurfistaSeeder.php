<?php

namespace Database\Seeders;

use App\Models\Surfista;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SurfistaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $surfista = Surfista::create([
            'numero' => 1,
            'nome' => 'John Doe',
            'pais' => 'Estados Unidos',
            'created_at' => now(),
        ]);

        $surfista = Surfista::create([
            'numero' => 2,
            'nome' => 'Jane Doe',
            'pais' => 'Estados Unidos', 
            'created_at' => now(),
        ]);

        $surfista->timestamps = false;

    }
}
