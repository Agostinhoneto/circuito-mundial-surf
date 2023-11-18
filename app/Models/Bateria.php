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

    public function surfista1()
    {
        return $this->belongsTo(Surfista::class, 'surfista1');
    }

    public function surfista2()
    {
        return $this->belongsTo(Surfista::class, 'surfista2');
    }

    public function calcularVencedor()
    {
        
        $notasSurfista1 = $this->surfista1->notas->sortByDesc('calcularMedia')->take(2);
        dd($notasSurfista1->notas());
        $notasSurfista2 = $this->surfista2->notas->sortByDesc('calcularMedia')->take(2);
        $somaNotasSurfista1 = $notasSurfista1->sum('calcularMedia');
        $somaNotasSurfista2 = $notasSurfista2->sum('calcularMedia');
        return ($somaNotasSurfista1 > $somaNotasSurfista2) ? $this->surfista1 : $this->surfista2;
    }
}
