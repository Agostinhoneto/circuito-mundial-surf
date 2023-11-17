<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'onda',
        'notaParcial1',
        'notaParcial2',
        'notaParcial3',
    ];

    public function calcularMedia()
    {
        return ($this->notaParcial1 + $this->notaParcial2 + $this->notaParcial3) / 3;
    }
}
