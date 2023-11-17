<?php

namespace App\Services;
use App\Http\Repositories\SurfistaRepository;


class SurfistaService
{

    protected $surfistaRepository;

    public function __construct(SurfistaRepository $surfistaRepository)
    {
        $this->surfistaRepository = $surfistaRepository;
    }

    /*
    public function getAll($limit = 10)
    {
        return $this->surfistaRepository->getAll($limit);
    }

    public function getById($id)
    {
        return $this->surfistaRepository
            ->getById($id);
    }
    */
    public function register($numero,$nome,$pais)
    {
       // dd('oi');
        $result = $this->surfistaRepository->save($numero,$nome,$pais);
        return $result;
    }

    /*
    public function update($id, $nome, $nome_social, $razao_social, $cnpj, $telefone, $email, $tipo_empresa_id, $natureza_empresa_id, $inscricao_empresa_id,$status,$usuario_cadastrante_id,$usuario_alterante_id)
    {
        $result = $this->empresaRepository
           ->update($id, $nome, $nome_social, $razao_social, $cnpj, $telefone, $email, $tipo_empresa_id, $natureza_empresa_id, $inscricao_empresa_id,$status,$usuario_cadastrante_id,$usuario_alterante_id);
        return $result;
    }

    public function deleteById($id)
    {
        $empresa = $this->empresaRepository->alterar_status($id);
        return $empresa;
    }
    */
}
