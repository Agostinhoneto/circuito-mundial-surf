<?php

namespace App\Http\Controllers;

use App\HttpStatusCodes;
use App\Messages;
use App\Models\Nota;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NotasController extends Controller
{
    public function index()
    {
        return Nota::all();
    }

    public function show($id)
    {
        return Nota::find($id);
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $onda = new Nota();
            $onda->id = $request->id;
            $onda->onda = $request->onda;
            $onda->notaParcial1 = $request->notaParcial1;
            $onda->notaParcial2 = $request->notaParcial2;
            $onda->notaParcial3 = $request->notaParcial3;
            $onda->save();
            return response()->json([Messages::SAVE_MESSAGE, HttpStatusCodes::OK]);
            DB::commit();
        } catch (Exception $e) {
            return response()->json([Messages::ERROR_MESSAGE, HttpStatusCodes::INTERNAL_SERVER_ERROR]);
            DB::roolBack();
        }
    }

    public function update(Request $request, $id)
    {
        $notas = Nota::findOrFail($id);
        $notas->update($request->all());

        return $notas;
    }

    public function destroy($id)
    {
        $notas = Nota::findOrFail($id);
        $notas->delete();
        return 204;
    }
}
