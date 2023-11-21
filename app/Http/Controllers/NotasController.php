<?php

namespace App\Http\Controllers;

use App\Http\Requests\NotasFormRequest;
use App\HttpStatusCodes;
use App\Messages;
use App\Models\Nota;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NotasController extends Controller
{
   
    public function store(NotasFormRequest $request)
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
            dd($e);
            DB::rollback();
            return response()->json([Messages::ERROR_MESSAGE, HttpStatusCodes::INTERNAL_SERVER_ERROR]);
        }
    }
}
