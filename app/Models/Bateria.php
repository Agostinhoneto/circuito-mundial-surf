<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bateria extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'surfista1',
        'surfista2',
    ];

    public function notas()
    {
        return $this->belongsTo(Nota::class);
    }

    public function surfistas()
    {
        return $this->belongsTo(Surfista::class);
    }

    public function primeiroSurfista()
    {
        return $this->belongsTo(Surfista::class, 'surfista1', 'numero');
    }

    public function segundoSurfista()
    {
        return $this->belongsTo(Surfista::class, 'surfista2', 'numero');
    }


    public function calcularVencedor()
    {
        $surfistaMaiorNota1 = 0;
        $surfistaMaiorNota2 = 0;

        foreach ($this->primeiroSurfista->ondas()->get() as $onda) {
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

        foreach ($this->segundoSurfista->ondas()->get() as $onda) {
            $nota = $onda->nota->first();
            $temp = ($nota->notaParcial1 + $nota->notaParcial2 + $nota->notaParcial3) / 3;
            if ($temp > $surfista2MaiorNota1) {
                $surfista2MaiorNota1 = $temp;
            } elseif ($temp > $surfista2MaiorNota2) {
                $surfista2MaiorNota2 = $temp;
            }
        }

        $total2 = $surfista2MaiorNota1 + $surfista2MaiorNota2;
        return ($total1 > $total2) ? $this->primeiroSurfista : $this->segundoSurfista;
    }
}
