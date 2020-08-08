<?php

namespace App\Repositories;

use App\Model\Tarefa;

class TarefaRepository implements TarefaRepositoryInterface
{
    public function listar(){
        return Tarefa::all();
    }

    public function adicionar($request,$id){
        $tarefa=new Tarefa();
        $tarefa->titulo=$request->titulo;
        $tarefa->conteudo=$request->conteudo;
        $tarefa->categoria_id=$id;
        $tarefa->status=$request->status;
        $tarefa->save();
    }

    public function atualizar($request,$id){
        $tarefa=Tarefa::findOrFail($id);
        $tarefa->titulo=$request->titulo;
        $tarefa->conteudo=$request->conteudo;
        $tarefa->categoria_id=$id;
        $tarefa->save();
    }

    public function filtro($id){
        return Tarefa::WHERE('categoria_id',$id)->get();
    }

    public function finalizarTarefa($request,$id){
        $tarefa=Tarefa::findOrFail($id);
        $tarefa->status=$request->status;
        $tarefa->save();
    }
}
