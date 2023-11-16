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
}
