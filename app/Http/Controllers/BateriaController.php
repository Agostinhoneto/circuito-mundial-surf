<?php

namespace App\Http\Controllers;

use App\Http\Requests\BateriaFormRequest;
use App\HttpStatusCodes;
use App\Messages;
use App\Models\Bateria;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class BateriaController extends Controller
{
    public function store(Request $request)
    {

        DB::beginTransaction();
        try {
            
            $bateria = Bateria::create([
                'id' => $request->input('id'),
                'surfista1' => $request->input('surfista1'),
                'surfista2' => $request->input('surfista2'),
            ]);
            DB::commit();
            return response()->json([Messages::SAVE_MESSAGE, HttpStatusCodes::OK,$bateria]);
        } catch (Exception $e) {
            dd($e);
            DB::rollback();
            return response()->json([Messages::ERROR_MESSAGE, HttpStatusCodes::INTERNAL_SERVER_ERROR]);
        }
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
