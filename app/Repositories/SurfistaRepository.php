<?php

namespace App\Repositories;

use App\Models\Surfista;


class SurfistaRepository
{


    public function salvar($numero, $nome, $pais)
    {
        try {
            $surfista = new Surfista();
            $surfista->numero = $numero;
            $surfista->nome = $nome;
            $surfista->pais  = $pais;
            $surfista->save();

            return $surfista;
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    }
}
