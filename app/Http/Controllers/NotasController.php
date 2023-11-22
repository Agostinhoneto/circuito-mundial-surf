<?php

namespace App\Http\Controllers;

use App\Http\Requests\NotasFormRequest;
use App\Http\Resources\NotasResource;
use App\Helpers\HttpStatusCodes;
use App\Helpers\Messages;
use App\Models\Nota;
use App\Services\NotasService;
use Illuminate\Http\Request;


class NotasController extends Controller
{
    private $notasService;

    public function __construct(NotasService $notasService)
    {
        $this->notasService = $notasService;
    }

    public function index(Request $request)
    {
        $nota = Nota::paginate();
        return NotasResource::collection($nota);
    }
    public function store(NotasFormRequest $request)
    {
        $result['data'] =  $this->notasService->salvar(
            $request->id,
            $request->onda,
            $request->notaParcial1,
            $request->notaParcial2,
            $request->notaParcial3,

        );
        return response()->json([Messages::SAVE_MESSAGE, HttpStatusCodes::OK, $result]);

        /*
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
        */
    }
}
