<?php

namespace App\Services;

use App\Repositories\OndasRepository;
use Illuminate\Support\Facades\DB;

class OndasService
{
    private $ondaRepository;

    public function __construct(OndasRepository $ondaRepository)
    {
        $this->ondaRepository = $ondaRepository;
    }

    public function salvar($id, $bateria_id, $surfista_id)
    {
        DB::beginTransaction();
        try {
            $data = $this->ondaRepository->salvar($id, $bateria_id, $surfista_id);
            DB::commit();
            return $data;
        } catch (\Exception $e) {
            DB::rollback();
            throw new \Exception($e);
        }
    }
}
