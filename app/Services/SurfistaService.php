<?php

namespace App\Services;
use App\Http\Repositories\SurfistaRepository;


class SurfistaService
{

    protected $empresaRepository;

    public function __construct(SurfistaRepository $empresaRepository)
    {
        $this->empresaRepository = $empresaRepository;
    }

    public function getAll($limit = 10)
    {
        return $this->empresaRepository->getAll($limit);
    }

    public function getById($id)
    {
        return $this->empresaRepository
            ->getById($id);
    }

    public function register($user_id, $nome, $nome_social, $razao_social, $cnpj, $telefone, $email, $tipo_empresa_id, $natureza_empresa_id, $inscricao_empresa_id,$status,$usuario_cadastrante_id,$usuario_alterante_id)
    {
        $result = $this->empresaRepository
            ->save($user_id, $nome, $nome_social, $razao_social, $cnpj, $telefone, $email, $tipo_empresa_id, $natureza_empresa_id, $inscricao_empresa_id,$status,$usuario_cadastrante_id,$usuario_alterante_id);
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
