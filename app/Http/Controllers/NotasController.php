<?php

namespace App\Http\Controllers;

use App\Http\Requests\NotasFormRequest;
use App\Http\Resources\NotasResource;
use App\Helpers\HttpStatusCodes;
use App\Helpers\Messages;
use App\Models\Nota;
use Exception;
use Illuminate\Support\Facades\DB;

class NotasController extends Controller
{

    public function store(NotasFormRequest $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->validated();
            $nota = Nota::create($data);
            new NotasResource($nota);
            DB::commit();
            return response()->json([Messages::SAVE_MESSAGE, HttpStatusCodes::OK,$nota]);
        } catch (Exception $e) {
            DB::rollback();
            return response()->json([Messages::ERROR_MESSAGE, HttpStatusCodes::INTERNAL_SERVER_ERROR]);
        }
    }
}
