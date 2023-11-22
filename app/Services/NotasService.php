<?php

namespace App\Services;

use App\Repositories\NotasRepository;
use Illuminate\Support\Facades\DB;

class NotasService
{
    private $notasRepository;

    public function __construct(NotasRepository $notasRepository)
    {
        $this->notasRepository = $notasRepository;
    }

    public function salvar($id,$onda,$notaParcial1,$notaParcial2,$notaParcial3)
    {
        DB::beginTransaction();
        try {
            $data = $this->notasRepository->salvar(
                $id,
                $onda,
                $notaParcial1,
                $notaParcial2,
                $notaParcial3
            );
            DB::commit();
            return $data;
        } catch (\Exception $e) {
            DB::rollback();
            throw new \Exception($e);
        }
    }
}
