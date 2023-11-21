<?php

namespace App\Http\Controllers;

use App\HttpStatusCodes;
use App\Messages;
use App\Models\Nota;
use App\Models\Surfista;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NotasController extends Controller
{
    public function index()
    {
        $notas = Nota::get()->toJson(JSON_PRETTY_PRINT);
        return response()->json([Messages::SUCCESS_MESSAGE, HttpStatusCodes::OK,$notas]);
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $nota = new Nota();
            $nota->id = $request->id;
            $nota->onda = $request->onda;
            $nota->notaParcial1 = $request->notaParcial1;
            $nota->notaParcial2 = $request->notaParcial2;
            $nota->notaParcial3 = $request->notaParcial3;
            $nota->save();
            DB::commit();        
            return response()->json([Messages::SAVE_MESSAGE, HttpStatusCodes::OK]);
        } catch (Exception $e) {
            DB::rollback();
            return response()->json([Messages::ERROR_MESSAGE, HttpStatusCodes::INTERNAL_SERVER_ERROR]);
        }
    }
}
