<?php

namespace App\Http\Controllers;

use App\HttpStatusCodes;
use App\Messages;
use App\Models\Onda;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OndasController extends Controller
{
    public function index()
    {
        $surfista = Onda::get()->toJson(JSON_PRETTY_PRINT);
        return response($surfista, 200);
    }

    public function show($id)
    {
        return Onda::find($id);
    }

    public function store(Request $request)
    {
            $onda = new Onda();
            $onda->id = $request->id;
            $onda->bateria_id = $request->bateria_id;
            $onda->save();
            return response()->json([Messages::SAVE_MESSAGE, HttpStatusCodes::OK]);
        
    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $onda = Onda::where('id', $id)->get();
            if (!$onda) {
                return response()->json(['message' => 'onda não encontrado'], 404);
            }
            $onda->bateria_id =  $request->bateria_id;
            $onda->update();
            return response()->json([Messages::SAVE_MESSAGE, HttpStatusCodes::OK]);
            DB::commit();
        } catch (Exception $e) {
            return response()->json([Messages::ERROR_MESSAGE, HttpStatusCodes::INTERNAL_SERVER_ERROR]);
            DB::roolBack();
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $onda = Onda::findOrFail($id);
            if (!$onda) {
                return response()->json([Messages::SAVE_MESSAGE, HttpStatusCodes::OK]);
            }
            $onda->delete();
        } catch (Exception $e) {
            return response()->json([Messages::ERROR_MESSAGE, HttpStatusCodes::INTERNAL_SERVER_ERROR]);
            DB::roolBack();
        }
    }
}
