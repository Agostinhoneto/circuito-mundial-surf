<?php

namespace App\Http\Controllers;

use App\HttpStatusCodes;
use App\Messages;
use App\Models\Onda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OndasController extends Controller
{
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $onda = Onda::create([
                'id' => $request->input('id'),
                'bateria_id' => $request->input('bateria_id'),
                'surfista_id' => $request->input('surfista_id'),
            ]);
            DB::commit();
            return response()->json([Messages::SAVE_MESSAGE, HttpStatusCodes::OK,$onda]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([Messages::ERROR_MESSAGE, HttpStatusCodes::INTERNAL_SERVER_ERROR]);
        }
    }
}
