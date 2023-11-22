<?php

namespace App\Services;

use App\Repositories\SurfistasRepository;
use Illuminate\Support\Facades\DB;

class SurfistasService
{
    private $surfistaRepository;

    public function __construct(SurfistasRepository $surfistaRepository)
    {
        $this->surfistaRepository = $surfistaRepository;
    }

    public function salvar($numero, $nome, $pais)
    {
        DB::beginTransaction();
        try {
            $data = $this->surfistaRepository->salvar($numero, $nome, $pais);
            DB::commit();
            return $data;
        } catch (\Exception $e) {
            DB::rollback();
            throw new \Exception($e);
        }
    }
}
