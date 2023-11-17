<?php

namespace App\Http\Controllers;
use App\Http\Requests\SurfistaRequest;
use App\HttpStatusCodes;
use App\Messages;
use App\Models\Surfista;
use App\Services\SurfistaService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SurfistaController extends Controller
{

    public function __construct(private SurfistaService $surfistaService)
    {
        $this->surfistaService = $surfistaService;
    }

    public function index()
    {
        return Surfista::all();
    }

    public function show($id)
    {
        return Surfista::find($id);
    }

    public function stores(SurfistaRequest $request)
    {
        //return Surfista::create($request->all());
          
        $dados = [
            $empresa_id          = $request->input('empresa_id'),
            $nome_fantasia       = $request->input('nome_fantasia'),
            $cnpj                = $request->input('cnpj'),
            $telefone            = $request->input('telefone'),
            $status              = $request->input('status'), 
            $inscricao_estadual  = $request->input('inscricao_estadual'),
        ];
        DB::beginTransaction();
        try {
            $dados['data'] =  $this->surfistaService->register(
                $empresa_id,
                $nome_fantasia,
                $cnpj,
                $telefone,
                $status,
                $inscricao_estadual
            );
            DB::commit();
            return response()->json([Messages::SAVE_MESSAGE,HttpStatusCodes::OK]);
        } catch (Exception $e) {
            dd($e);
            DB::roolBack();
            return response()->json([Messages::ERROR_MESSAGE, HttpStatusCodes::INTERNAL_SERVER_ERROR]);
        }
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
