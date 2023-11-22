<?php

namespace App\Http\Controllers;

use App\Http\Requests\SurfistaFormRequest;
use App\Http\Resources\SurfistaResource;
use App\Helpers\HttpStatusCodes;
use App\Helpers\Messages;
use App\Models\Surfista;
use Illuminate\Support\Facades\DB;
use App\Services\SurfistaService;

class SurfistaController extends Controller
{
    private $surfistaService;

    public function __construct(SurfistaService $surfistaService)
    {
        $this->surfistaService = $surfistaService;
    }

    public function index()
    {
        $surfista = Surfista::paginate();
        return SurfistaResource::collection($surfista);
    }

    public function store(SurfistaFormRequest $request)
    {

        $result['data'] =  $this->surfistaService->salvar(
            $request->numero,
            $request->nome,
            $request->pais,
        );
        return response()->json([Messages::SAVE_MESSAGE, HttpStatusCodes::OK, $result]);
    }
}
