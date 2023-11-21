<?php

namespace App\Http\Controllers;

use App\HttpStatusCodes;
use App\Messages;
use App\Models\Onda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OndasController extends Controller
{
    public function index()
    {
        $onda = Onda::get()->toJson(JSON_PRETTY_PRINT);
        return response()->json([Messages::SUCCESS_MESSAGE, HttpStatusCodes::OK,$onda]);
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $onda = new Onda();
            $onda->id = $request->id;
            $onda->bateria_id = $request->bateria_id;
            $onda->save();
            return response()->json([Messages::SAVE_MESSAGE, HttpStatusCodes::OK]);
            DB::commit();
            return response()->json([Messages::SAVE_MESSAGE, HttpStatusCodes::OK]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([Messages::ERROR_MESSAGE, HttpStatusCodes::INTERNAL_SERVER_ERROR]);
        }
    }
}
