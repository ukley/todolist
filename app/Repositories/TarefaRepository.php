<?php

namespace App\Repositories;

use App\Model\Horario;
use App\Model\Tarefa;
use Carbon\Carbon;
use DB;

class TarefaRepository implements TarefaRepositoryInterface
{
    public function listar(){
        $data=Carbon::now()->format('Y-m-d');

        return DB::connection('mysql')
            ->select("SELECT tarefas.*,h.*,cat.categorias FROM tarefas
                    INNER JOIN horarios h ON tarefas.id=h.tarefa_id
                    INNER JOIN categorias cat ON tarefas.categoria_id=cat.id WHERE tarefas.dataEvento >=$data && tarefas.status!='I'
                    order by tarefas.dataEvento asc");
    }

    public function adicionar($request){

        $tarefa=new Tarefa();
        $tarefa->titulo=$request->titulo;
        $tarefa->conteudo=$request->conteudo;
        $tarefa->categoria_id=$request->categoria;
        $tarefa->dataEvento=Carbon::parse($request['dataEvento'])->format('Y-m-d');
        $tarefa->status='A';
        $tarefa->save();

        return $this->inserirHorario($request,$tarefa->id);

    }

    public function atualizar($request,$id){
        $tarefa=Tarefa::findOrFail($id);
        $tarefa->titulo=$request->titulo;
        $tarefa->conteudo=$request->conteudo;
        $tarefa->dataEvento=Carbon::parse($request['dataEvento'])->format('Y-m-d');
        $tarefa->categoria_id=$request->categoria;
        $tarefa->save();

        $horario=Horario::findOrfail($request->idHorario);
        $horario->inicial=$request->inicial;
        $horario->final=$request->final;
        $horario->tarefa_id=$id;
        $horario->save();

    }

    public function filtro($id){
        $data=Carbon::now()->format('Y-m-d');

        return DB::connection('mysql')
            ->select("SELECT tarefas.*,h.*,cat.categorias FROM tarefas
                    INNER JOIN horarios h ON tarefas.id=h.tarefa_id
                    INNER JOIN categorias cat ON tarefas.categoria_id=cat.id WHERE tarefas.dataEvento >=$data && tarefas.status!='I' && tarefas.categoria_id=$id
                    order by tarefas.dataEvento asc");

    }

    public function finalizarTarefa($request,$id){
        $tarefa=Tarefa::findOrFail($id);
        $tarefa->status='I';
        $tarefa->save();
    }

    public function inserirHorario($data,$id){
        $horario=new Horario();
        $horario->inicial=$data->inicial;
        $horario->final=$data->final;
        $horario->tarefa_id=$id;
        $horario->save();
    }

    public function visualizar($id){
        return collect(DB::connection('mysql')
            ->select("SELECT tarefas.*,h.*,cat.categorias FROM tarefas
                    INNER JOIN horarios h ON tarefas.id=h.tarefa_id
                    INNER JOIN categorias cat ON tarefas.categoria_id=cat.id
                    WHERE tarefas.id=?",[$id]));
    }

    public function realizarAtualizacao($idTarefa){

        $tarefa=Tarefa::whereHas('horarios', function($query) use ($idTarefa)
               {
                   $query->where('tarefa_id', $idTarefa);
               })
               ->with('horarios')
               ->first();
        //dd($tarefa);

        return $tarefa;
    }
}
