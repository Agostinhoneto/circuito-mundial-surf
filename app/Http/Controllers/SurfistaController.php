<?php

namespace App\Http\Controllers;

use App\Http\Requests\SurfistaFormRequest;
use App\Http\Resources\SurfistaResource;
use App\Helpers\HttpStatusCodes;
use App\Helpers\Messages;
use App\Models\Surfista;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SurfistaController extends Controller
{

    public function index(Request $request)
    {
        $surfista = Surfista::paginate();
        return SurfistaResource::collection($surfista);
    }

    public function store(SurfistaFormRequest $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->validated();
            $surfista = Surfista::create($data);
            new SurfistaResource($surfista);
            DB::commit();
            return response()->json([Messages::SAVE_MESSAGE, HttpStatusCodes::OK,$surfista]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([Messages::ERROR_MESSAGE, HttpStatusCodes::INTERNAL_SERVER_ERROR]);
        }
    }
}
