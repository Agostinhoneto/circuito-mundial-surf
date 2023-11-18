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
        return $this->belongsTo(Surfista::class, 'surfista1','numero');
    }

    public function segundoSurfista()
    {
        return $this->belongsTo(Surfista::class,'surfista2','numero');
    }


    public function calcularVencedor()
    {
        dd($this->primeiroSurfista->ondas()->get());   
        $notasSurfista1 = $this->primeiroSurfista->notas->sortByDesc('calcularMedia')->take(2);
        dd($notasSurfista1);
        $notasSurfista2 = $this->segundoSurfista->notas->sortByDesc('calcularMedia')->take(2);
        $somaNotasSurfista1 = $notasSurfista1->sum('calcularMedia');
        $somaNotasSurfista2 = $notasSurfista2->sum('calcularMedia');
        return ($somaNotasSurfista1 > $somaNotasSurfista2) ? $this->surfista1 : $this->surfista2;
    }
}
