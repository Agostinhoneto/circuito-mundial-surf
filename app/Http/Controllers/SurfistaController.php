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

    public function show($numero)
    {
        $surfista = Surfista::where('numero',$numero)->get();
        return $surfista;
    }

    public function store(SurfistaRequest $request)
    {
            $surfista = new Surfista();
            $surfista->numero = $request->numero;
            $surfista->nome = $request->nome;
            $surfista->pais = $request->pais;
            $surfista->save();
    }

    public function update(Request $request, $numero)
    {
        $surfista = Surfista::where('numero',$numero)->get();
        if (!$surfista) {
            return response()->json(['message' => 'Surfista não encontrado'], 404);
        }
        $surfista->nome =  $request->nome;
        $surfista->pais =  $request->pais;
        $surfista->update();

        return response()->json(['message' => 'Surfista atualizado com sucesso', 'data' => $surfista]); 
    }

    public function destroy($id)
    {
        if (Surfista::where('numero', $id)->exists()) {
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
