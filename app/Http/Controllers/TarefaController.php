<?php

namespace App\Http\Controllers;

use App\Repositories\TarefaRepository;
use App\Repositories\TarefaRepositoryInterface;
use Illuminate\Http\Request;

class TarefaController extends Controller
{
    public function __construct(TarefaRepositoryInterface $tarefaRepository)
    {
        $this->tarefaRepository=$tarefaRepository;
    }

    public function listar(){

        $listar=$this->tarefaRepository->listar();
		return $listar;
	}

    public function adicionar(Request $request,$id){
    	return $this->tarefaRepository->adicionar($request,$id);
    }

    public function filtrar($id){
        return $this->tarefaRepository->filtro($id);
    }

    public function atualizar(Request $request,$id){
        return $this->tarefaRepository->atualizar($request,$id);
    }

    public function finalizar(Request $request,$id){
        return $this->tarefaRepository->finalizarTarefa($request,$id);
    }
}
