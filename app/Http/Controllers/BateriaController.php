<?php

namespace App\Http\Controllers;

use App\Http\Requests\BateriasRequest;
use App\HttpStatusCodes;
use App\Messages;
use App\Models\Bateria;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BateriaController extends Controller
{
    public function index()
    {
        return response()->json(Bateria::all());
    }

    public function show($id)
    {
        return Bateria::find($id);
    }

    public function store(BateriasRequest $request)
    {

        DB::beginTransaction();
        try {
            $baterias = new Bateria();
            $baterias->id = $request->id;
            $baterias->surfista1 = $request->surfista1;
            $baterias->surfista2 = $request->surfista2;
            $baterias->save();
            return response()->json([Messages::SAVE_MESSAGE, HttpStatusCodes::OK]);
            DB::commit();
        } catch (Exception $e) {
            return response()->json([Messages::ERROR_MESSAGE, HttpStatusCodes::INTERNAL_SERVER_ERROR]);
            DB::roolBack();
        }
    }

    public function update(Request $request, $id)
    {
        $bateria = Bateria::findOrFail($id);
        $bateria->update($request->all());

        return $bateria;
    }

    // calcular media
    public function calcularMedia($nota1, $nota2, $nota3)
    {
        $nota1 = 0;
        $nota2 = 0;
        $nota3 = 0;

        return ($nota1 + $nota2 + $nota3) / 3;
    }

    public function calcularVencedor($surfista1, $surfista2)
    {
        $surfista1;
        $surfista2;

        $notasSurfista1 = $surfista1->notas->sortByDesc('media')->take(2);
        dd($notasSurfista1);
        $notasSurfista2 = $surfista2->notas->sortByDesc('media')->take(2);

        $somaNotasSurfista1 = $notasSurfista1->sum('media');
        $somaNotasSurfista2 = $notasSurfista2->sum('media');

        return ($somaNotasSurfista1 > $somaNotasSurfista2) ? $surfista1 : $surfista2;
    }

    public function determinarVencedor($bateriaId)
    {
        $bateria = Bateria::findOrFail($bateriaId);
        //dd($bateria);
        $vencedor = $bateria->calcularVencedor();

        return response()->json(['vencedor' => $vencedor]);
    }

    

    public function destroy($id)
    {
        $bateria = Bateria::findOrFail($id);
        $bateria->delete();
        return 204;
    }
}
