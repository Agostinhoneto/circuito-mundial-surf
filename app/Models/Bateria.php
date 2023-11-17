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
}
