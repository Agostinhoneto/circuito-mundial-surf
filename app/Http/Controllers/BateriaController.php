<?php

namespace App\Http\Controllers;

use App\Http\Requests\BateriaFormRequest;
use App\HttpStatusCodes;
use App\Messages;
use App\Models\Bateria;
use Exception;
use Illuminate\Support\Facades\DB;

class BateriaController extends Controller
{
    public function index()
    {
        $query = Bateria::all();
        return response()->json([Messages::SUCCESS_MESSAGE, HttpStatusCodes::OK, $query]); 
       }

  
    public function store(BateriaFormRequest $request)
    {

        DB::beginTransaction();
        try {
            $baterias = new Bateria();
            $baterias->id = $request->id;
            $baterias->surfista1 = $request->surfista1;
            $baterias->surfista2 = $request->surfista2;
            $baterias->save();
            DB::commit();
            return response()->json([Messages::SAVE_MESSAGE, HttpStatusCodes::OK]);
        } catch (Exception $e) {
            DB::rollback();
            return response()->json([Messages::ERROR_MESSAGE, HttpStatusCodes::INTERNAL_SERVER_ERROR]);
        }
    }

    public function calcularMedia($nota1, $nota2, $nota3)
    {
        $nota1 = 0;
        $nota2 = 0;
        $nota3 = 0;
        return ($nota1 + $nota2 + $nota3) / 3;
    }

    public function determinarVencedor($bateriaId)
    {
        $bateria = Bateria::with('primeiroSurfista','segundoSurfista','primeiroSurfista.ondas')->findOrFail($bateriaId);
        $vencedor = $bateria->calcularVencedor();
        return response()->json(['vencedor' => $vencedor]);
    }

}
