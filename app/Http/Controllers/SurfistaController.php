<?php

namespace App\Http\Controllers;

use App\Http\Requests\SurfistaFormRequest;
use App\HttpStatusCodes;
use App\Messages;
use App\Models\Surfista;
use App\Repositories\SurfistaRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SurfistaController extends Controller
{

    public function index(Request $request)
    {
        DB::beginTransaction();
        try {
            $query = Surfista::query();
            if ($request->has('nome')) {
                $query->where('nome', $request->nome);
            }
            return response()->json([Messages::SAVE_MESSAGE, HttpStatusCodes::OK], $query);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([Messages::ERROR_MESSAGE, HttpStatusCodes::INTERNAL_SERVER_ERROR]);
        }
    }

    public function store(SurfistaFormRequest $request)
    {
        DB::beginTransaction();
        try {
            $surfista = Surfista::create([
                'numero' => $request->input('numero'),
                'nome' => $request->input('nome'),
                'pais' => $request->input('pais'),
            ]);
            DB::commit();
            return response()->json([Messages::SAVE_MESSAGE, HttpStatusCodes::OK]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([Messages::ERROR_MESSAGE, HttpStatusCodes::INTERNAL_SERVER_ERROR]);
        }
    }
}
