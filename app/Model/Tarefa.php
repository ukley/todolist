<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
    protected $table="tarefas";

    protected $guarded=[];

    public function horarios(){
        return $this->hasMany(Horario::class,'tarefa_id','id');
    }

    //protected $fillable=['titulo','conteudo','categoria_id','status'];


}
