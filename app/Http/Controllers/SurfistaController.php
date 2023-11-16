<?php

namespace App\Http\Controllers;

use App\Models\Surfista;
use Illuminate\Http\Request;

class SurfistaController extends Controller
{
    public function index()
    {
        return Surfista::all();
    }

    public function show($id)
    {
        return Surfista::find($id);
    }

    public function store(Request $request)
    {
        return Surfista::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $surfista = Surfista::findOrFail($id);
        $surfista->update($request->all());

        return $surfista;
    }

    public function destroy($id)
    {
        $surfista = Surfista::findOrFail($id);
        $surfista->delete();
        return 204; 
    }
}
