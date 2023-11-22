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
            $data = $this->bateriasRepository->salvar(
                $id,
                $surfista1,
                $surfista2);
            DB::commit();
            return $data;
        } catch (\Exception $e) {
            DB::rollback();
            throw new \Exception($e);
        }
    }

    public function calcularVencedor()
    {
        $ondasSurfistaBaterias1 = $this->bateriasRepository->listaSurfistaBateria1() ;
        $ondasSurfistaBaterias2 = $this->bateriasRepository->listaSurfistaBateria2() ;

        $surfistaMaiorNota1 = 0;
        $surfistaMaiorNota2 = 0;

        foreach ($ondasSurfistaBaterias1 as $onda) {
            if(!isset($onda->nota)) continue;
            $nota = $onda->nota->first();
            $temp = ($nota->notaParcial1 + $nota->notaParcial2 + $nota->notaParcial3) / 3;
            if ($temp > $surfistaMaiorNota1) {
                $surfistaMaiorNota1 = $temp;
            } elseif ($temp > $surfistaMaiorNota2) {
                $surfistaMaiorNota2 = $temp;
            }
        }

        $total1 = $surfistaMaiorNota1 + $surfistaMaiorNota2;
        $surfista2MaiorNota1 = 0;
        $surfista2MaiorNota2 = 0;

        foreach ($ondasSurfistaBaterias2 as $onda) {
            if(!isset($onda->nota)) continue;
            $nota = $onda->nota->first();
            $temp = ($nota->notaParcial1 + $nota->notaParcial2 + $nota->notaParcial3) / 3;
            if ($temp > $surfista2MaiorNota1) {
                $surfista2MaiorNota1 = $temp;
            } elseif ($temp > $surfista2MaiorNota2) {
                $surfista2MaiorNota2 = $temp;
            }
        }

        $total2 = $surfista2MaiorNota1 + $surfista2MaiorNota2;
        return ($total1 > $total2) ? $ondasSurfistaBaterias1 :$ondasSurfistaBaterias2;
    }
}
