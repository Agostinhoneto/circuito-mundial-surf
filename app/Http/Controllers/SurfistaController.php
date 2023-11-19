<?php

namespace App\Http\Controllers;

use App\Http\Requests\SurfistaFormRequest;
use App\Models\Surfista;
use App\Repositories\SurfistaRepository;
use Exception;
use Illuminate\Http\Request;

class SurfistaController extends Controller
{
    /*    
    public function __construct(private SurfistaRepository $surfistaRepository)
    {
    }
    */
    public function index(Request $request)
    {
        $query = Surfista::query();
        if ($request->has('nome')) {
            $query->where('nome' , $request->nome);
        }

        return $query->paginate(5);
    }

    public function store(SurfistaFormRequest $request)
    {
       /*
        $surfista = new Surfista();
        $surfista->numero = $request->numero;
        $surfista->nome = $request->nome;
        $surfista->pais = $request->pais;
        $surfista->save();
        */

        try {
            $surfista = Surfista::create([
                'numero' => $request->input('numero'),
                'nome' => $request->input('nome'),
                'pais' => $request->input('pais'),
            ]);
            return response()->json(['data' => $surfista], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao criar o surfista'], 500);
        }
    }
}
