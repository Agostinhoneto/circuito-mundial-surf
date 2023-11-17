<?php

namespace App\Http\Controllers;

use App\Models\Bateria;
use Illuminate\Http\Request;

class BateriaController extends Controller
{
    public function index()
    {
        return Bateria::all();
    }

    public function show($id)
    {
        return Bateria::find($id);
    }

    public function store(Request $request)
    {
        return Bateria::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $bateria = Bateria::findOrFail($id);
        $bateria->update($request->all());

        return $bateria;
    }

    public function destroy($id)
    {
        $bateria = Bateria::findOrFail($id);
        $bateria->delete();
        return 204;
    }

    public function calcularMedia($nota1,$nota2,$nota3)
    {
        $nota1 = 0;
        $nota2 = 0;
        $nota3 = 0;

        return ($nota1 + $nota2 + $nota3) / 3;
    }

    public function calcularVencedor($surfista1,$surfista2)
    {
        $surfista1;
        $surfista2;

        $notasSurfista1 = $surfista1->notas->sortByDesc('media')->take(2);
        $notasSurfista2 = $surfista2->notas->sortByDesc('media')->take(2);

        $somaNotasSurfista1 = $notasSurfista1->sum('media');
        $somaNotasSurfista2 = $notasSurfista2->sum('media');

        return ($somaNotasSurfista1 > $somaNotasSurfista2) ? $surfista1 : $surfista2;
    }
}
