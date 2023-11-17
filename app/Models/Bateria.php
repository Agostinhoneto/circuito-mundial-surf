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

    public function surfistas()
    {
        return $this->hasMany(Surfista::class);
    }

    public function surfista1()
    {
<<<<<<< HEAD
        return $this->belongsTo(Surfista::class, 'surfista1');
=======
        return $this->belongsTo(Surfista::class, 'surfista1_id');
>>>>>>> refs/remotes/origin/master
    }

    public function surfista2()
    {
<<<<<<< HEAD
        return $this->belongsTo(Surfista::class, 'surfista2');
=======
        return $this->belongsTo(Surfista::class, 'surfista2_id');
>>>>>>> refs/remotes/origin/master
    }

    public function calcularVencedor()
    {
        $notasSurfista1 = $this->surfista1->notas->sortByDesc('calcularMedia')->take(2);
        $notasSurfista2 = $this->surfista2->notas->sortByDesc('calcularMedia')->take(2);
<<<<<<< HEAD
        $somaNotasSurfista1 = $notasSurfista1->sum('calcularMedia');
        $somaNotasSurfista2 = $notasSurfista2->sum('calcularMedia');
=======

        $somaNotasSurfista1 = $notasSurfista1->sum('calcularMedia');
        $somaNotasSurfista2 = $notasSurfista2->sum('calcularMedia');

>>>>>>> refs/remotes/origin/master
        return ($somaNotasSurfista1 > $somaNotasSurfista2) ? $this->surfista1 : $this->surfista2;
    }
}
