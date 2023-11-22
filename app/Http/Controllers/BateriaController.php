<?php

namespace App\Http\Controllers;

use App\Helpers\Messages;
use App\Http\Requests\BateriaFormRequest;
use App\Http\Resources\BateriasResource;
use App\Helpers\HttpStatusCodes;
use App\Models\Bateria;
use App\Services\BateriasService;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class BateriaController extends Controller
{

    private $bateriaService;

    public function __construct(BateriasService $bateriaService)
    {
        $this->bateriaService = $bateriaService;
    }

    public function index(Request $request)
    {
        $bateria = Bateria::paginate();
        return BateriasResource::collection($bateria);
    }

    public function store(BateriaFormRequest $request)
    {
        $result['data'] =  $this->bateriaService->salvar(
            $request->id,
            $request->surfista1,
            $request->surfista2,


        );
        return response()->json([Messages::SAVE_MESSAGE, HttpStatusCodes::OK, $result]);
        /*
        DB::beginTransaction();
        try {
            $data = $request->validated();
            $bateria = Bateria::create($data);
            new BateriasResource($bateria);
            DB::commit();
            return response()->json([Messages::SAVE_MESSAGE, HttpStatusCodes::OK,$bateria]);
        } catch (Exception $e) {
            dd($e);
            DB::rollback();
            return response()->json([Messages::ERROR_MESSAGE, HttpStatusCodes::INTERNAL_SERVER_ERROR]);
        }
        */
    }

    public function determinarVencedor($bateriaId)
    {
        if ($bateriaId == "") {
            return response()->json([Messages::ERROR_MESSAGE, HttpStatusCodes::INTERNAL_SERVER_ERROR]);
        } else {
            $bateria = Bateria::with('primeiroSurfista', 'segundoSurfista', 'primeiroSurfista.ondas')->findOrFail($bateriaId);
            $vencedor = $bateria->calcularVencedor();
            return response()->json(['Vencedor é :' => $vencedor]);
        }
    }
}
