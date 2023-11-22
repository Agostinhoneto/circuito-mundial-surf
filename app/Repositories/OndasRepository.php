<?php

namespace App\Repositories;

use App\Models\Onda;


class OndasRepository
{
    public function salvar($id, $bateria_id, $surfista_id)
    {
        try {
            $onda = new Onda();
            $onda->id = $id;
            $onda->bateria_id = $bateria_id;
            $onda->surfista_id  = $surfista_id;
            $onda->save();

            return $onda;
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    }
}
