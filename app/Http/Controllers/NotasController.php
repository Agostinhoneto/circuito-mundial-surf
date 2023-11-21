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
            $nota = Nota::create([
                'id' => $request->input('id'),
                'onda' => $request->input('onda'),
                'notaParcial1' => $request->input('notaParcial1'),
                'notaParcial2' => $request->input('notaParcial2'),
                'notaParcial3' => $request->input('notaParcial3'),
            ]);
            DB::commit();        
            return response()->json([Messages::SAVE_MESSAGE, HttpStatusCodes::OK]);
        } catch (Exception $e) {
            DB::rollback();
            return response()->json([Messages::ERROR_MESSAGE, HttpStatusCodes::INTERNAL_SERVER_ERROR]);
        }
    }
}
