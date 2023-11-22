<?php

namespace App\Http\Controllers;

use App\Http\Requests\OndasFormRequest;
use App\Http\Resources\OndasResource;
use App\Helpers\HttpStatusCodes;
use App\Helpers\Messages;
use App\Models\Onda;
use App\Services\OndaService;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class OndasController extends Controller
{
    private $ondaService;

    public function __construct(OndaService $ondaService)
    {
        $this->ondaService = $ondaService;
    }

    public function index(Request $request)
    {
        $onda = Onda::paginate();
        return OndasResource::collection($onda);
    }

    public function store(OndasFormRequest $request)
    {

        $result['data'] =  $this->ondaService->salvar(
            $request->id,
            $request->bateria_id,
            $request->surfista_id,
        );
        return response()->json([Messages::SAVE_MESSAGE, HttpStatusCodes::OK, $result]);
        /*
        DB::beginTransaction();
        try {
            $data = $request->validated();
            $onda = Onda::create($data);
            new OndasResource($onda);
            DB::commit();
            return response()->json([Messages::SAVE_MESSAGE, HttpStatusCodes::OK, $onda]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([Messages::ERROR_MESSAGE, HttpStatusCodes::INTERNAL_SERVER_ERROR]);
        }
        */
    }
}
