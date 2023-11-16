<?php

namespace App\Http\Controllers;

use App\Models\Nota;
use Illuminate\Http\Request;

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
        return Nota::create($request->all());
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
