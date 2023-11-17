<?php

namespace App\Http\Controllers;

use App\Http\Requests\SurfistaRequest;
use App\HttpStatusCodes;
use App\Messages;
use App\Models\Surfista;
use App\Services\SurfistaService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SurfistaController extends Controller
{
    public function index()
    {
        $surfista = Surfista::get()->toJson(JSON_PRETTY_PRINT);
        return response($surfista, 200);
    }

    public function show($id)
    {
        return Surfista::find($id);
    }

    public function store(SurfistaRequest $request)
    {
        DB::beginTransaction();
        try {
            $surfista = new Surfista();
            $surfista->numero = $request->numero;
            $surfista->nome = $request->nome;
            $surfista->pais = $request->pais;
            $surfista->save();
            return response()->json([Messages::SAVE_MESSAGE, HttpStatusCodes::OK]);
            DB::commit();
        } catch (Exception $e) {
            return response()->json([Messages::ERROR_MESSAGE, HttpStatusCodes::INTERNAL_SERVER_ERROR]);
            DB::roolBack();
        }
    }

    public function update(Request $request, $id)
    {
        if (Surfista::where('numero', $id)->exists()) {
            $surfista = Surfista::find($id);
            $surfista->name = is_null($request->nome) ? $surfista->nome : $request->nome;
            $surfista->pais = is_null($request->pais) ? $surfista->pais : $request->pais;
            $surfista->save();
            return response()->json([
                "message" => "updated successfully"
            ], 200);
        } else {
            return response()->json([
                "message" => "Student not found"
            ], 404);
        }
    }

    public function deleteStudent($id)
    {
        if (Surfista::where('id', $id)->exists()) {
            $surfista = Surfista::find($id);
            $surfista->delete();
            return response()->json([
                "message" => "records deleted"
            ], 202);
        } else {
            return response()->json([
                "message" => "Student not found"
            ], 404);
        }
    }
}
