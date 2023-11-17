<?php
namespace App\Http\Repositories;

use App\Models\Surfista;

class SurfistaRepository{
    
    protected $surfista;
    
    public function __construct(Surfista $surfista)
    {
        $this->surfista = $surfista;
    }
    
    public function getAll($limit){
        return Surfista::paginate($limit);
    }
    
    public function getById($id){
        return Surfista::findOrFail($id);
    }

    public function save($numero,$nome,$pais)
    {
        $surfista = new $this->surfista;
        $surfista->numero = $numero;
        $surfista->nome = $nome;
        $surfista->pais = $pais;        
        $surfista->save();           
        return $surfista->fresh();
    }
}

