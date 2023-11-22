<?php

namespace App\Services;

use App\Repositories\BateriasRepository;
use Illuminate\Support\Facades\DB;

class BateriasService
{
    private $bateriasRepository;

    public function __construct(BateriasRepository $bateriasRepository)
    {
        $this->bateriasRepository = $bateriasRepository;
    }

    public function salvar($id,$surfista1,$surfista2)
    {
        DB::beginTransaction();
        try {
            $data = $this->bateriasRepository->salvar($id,$surfista1,$surfista2);
            DB::commit();
            return $data;
        } catch (\Exception $e) {
            DB::rollback();
            throw new \Exception($e);
        }
    }
}
