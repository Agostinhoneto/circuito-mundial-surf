<?php

namespace App\Repositories;

use App\Models\Nota;


class NotasRepository
{
    public function salvar($id, $onda, $notaParcial1,$notaParcial2,$notaParcial3)
    {

        try {
            $nota = new Nota();
            $nota->id = $id;
            $nota->onda = $onda;
            $nota->notaParcial1  = $notaParcial1;
            $nota->notaParcial2  = $notaParcial2;
            $nota->notaParcial3  = $notaParcial3;
            $nota->save();

            return $nota;
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    }
}
