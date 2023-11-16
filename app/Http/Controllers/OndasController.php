<?php

namespace App\Http\Controllers;

use App\Models\Onda;
use Illuminate\Http\Request;

class OndasController extends Controller
{
    public function index()
    {
        return Onda::all();
    }

    public function show($id)
    {
        return Onda::find($id);
    }

    public function store(Request $request)
    {
        return Onda::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $onda = Onda::findOrFail($id);
        $onda->update($request->all());

        return $onda;
    }

    public function destroy($id)
    {
        $onda = Onda::findOrFail($id);
        $onda->delete();
        return 204; 
    }
}
