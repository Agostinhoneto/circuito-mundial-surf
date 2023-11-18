<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Onda extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'bateria_id',
        
    ];

    public function nota()
    {
        return $this->hasOne(Nota::class);
    }
}
