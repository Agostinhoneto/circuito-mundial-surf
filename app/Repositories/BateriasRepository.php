<?php

namespace App\Repositories;

use App\Models\Bateria;


class BateriasRepository
{
    public function salvar($id, $surfista1, $surfista2)
    {

        try {

            $bateria = new Bateria();
            $bateria->id = $id;
            $bateria->surfista1 = $surfista1;
            $bateria->surfista2  = $surfista2;

            $bateria->save();

            return $bateria;
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    }
}
