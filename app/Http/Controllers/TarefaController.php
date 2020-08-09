<?php

namespace App\Http\Controllers;

use App\Model\Categoria;
use App\Repositories\TarefaRepositoryInterface;


use Illuminate\Http\Request;
use Log,Validator;

class TarefaController extends Controller
{
    public function __construct(TarefaRepositoryInterface $tarefaRepository)
    {
        $this->tarefaRepository=$tarefaRepository;
    }
    public function index(){
        $categorias=Categoria::pluck('categorias','id');
        return view('index',compact('categorias'));
    }

    public function listar(){
        try {
            $lista=$this->tarefaRepository->listar();
        }catch (\Exception $e){
            return $e->getMessage();
        }
        return view('lista-tarefas',compact('lista'));
	}

    public function adicionar(Request $request){
        try {
            $this->tarefaRepository->adicionar($request);
            }catch (\Exception $e){
                return $e->getMessage();
        }
         return redirect('tarefas/adicionar')->with('status','Cadastro');

    }

    public function filtrar(Request $cat){
        try {
            $cat=$cat->query('cat');
            $lista=$this->tarefaRepository->filtro($cat);
        }catch (\Exception $e){
            return $e->getMessage();
        }
        return view('lista-tarefas',compact('lista'));

    }

    public function atualizar(Request $request,$id){
        try {
            $this->tarefaRepository->atualizar($request, $id);
        }catch (\Exception $e){
            return $e->getMessage();

        }
        return redirect()->route('update',['id'=>$id])->with('status','Tarefa Alterada');

    }

    public function finalizar(Request $request,$id){
        try {
            $this->tarefaRepository->finalizarTarefa($request, $id);
        }catch (\Exception $e){
            return $e->getMessage();
        }
        return redirect()->back()->with('status','Tarefa Removida');

    }

    public function visualizar($id){
        try {
            $info=$this->tarefaRepository->visualizar($id);
        }catch (\Exception $e){
            return $e->getMessage();
        }
        return view('info',compact('info'));

    }

    public function update($idTarefa){
        try {
            $categorias=Categoria::pluck('categorias','id');
            $update=$this->tarefaRepository->realizarAtualizacao($idTarefa);
        }catch (\Exception $e){
            return $e->getMessage();
        }
        return view('update',compact('update','categorias'));
    }



}
