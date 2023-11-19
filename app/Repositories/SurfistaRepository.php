<?php

namespace App\Repositories;

use App\Http\Requests\SurfistaFormRequest;
use App\Models\Surfista;

interface SurfistaRepository
{
    public function add(SurfistaFormRequest $request): Surfista;
}
