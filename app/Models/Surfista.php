<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surfista extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero',
        'nome',
        'pais',
    ];

    public function bateria()
    {
        return $this->belongsTo(Bateria::class);
    }

    public function notas()
    {
        return $this->hasMany(Nota::class);
    }

    public function ondas()
    {
        return $this->hasMany(Onda::class,'surfista_id','numero');
    }
}
