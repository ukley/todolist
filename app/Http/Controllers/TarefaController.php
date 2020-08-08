<?php

namespace App\Http\Controllers;

use App\Repositories\TarefaRepositoryInterface;
use Illuminate\Http\Request;

class TarefaController extends Controller
{
    public function __construct(TarefaRepositoryInterface $tarefaRepository)
    {
        $this->tarefaRepository=$tarefaRepository;
    }

    public function listar(){
        try {
            return $this->tarefaRepository->listar();
        }catch (\Exception $e){
            return Log::error('Log Error.', $e);
        }
	}

    public function adicionar(Request $request,$id){
        try {
            return $this->tarefaRepository->adicionar($request, $id);
        }catch (\Exception $e){
            return Log::error('Log Error.', $e);
        }
    }

    public function filtrar($id){
        try {
            return $this->tarefaRepository->filtro($id);
        }catch (\Exception $e){
            return Log::error('Log Error.', $e);
        }
    }

    public function atualizar(Request $request,$id){
        try {
            return $this->tarefaRepository->atualizar($request, $id);
        }catch (\Exception $e){
            return Log::error('Log Error.', $e);
        }
    }

    public function finalizar(Request $request,$id){
        try {
            return $this->tarefaRepository->finalizarTarefa($request, $id);
        }catch (\Exception $e){
            return Log::error('Log Error.', $e);
        }
    }
}
