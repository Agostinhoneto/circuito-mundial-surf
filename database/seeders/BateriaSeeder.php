<?php

namespace Database\Seeders;

use App\Models\Bateria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BateriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Bateria::create([
            'data' => '2023-01-01',
            // Adicione outros campos necessários para a bateria
        ]);

        Bateria::create([
            'data' => '2023-01-02',
            // Adicione outros campos conforme necessário
        ]);
    }
}
