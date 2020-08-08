<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
    protected $table="tarefas";

    public $timestamps=false;

    protected $guarded=[];

    //protected $fillable=['titulo','conteudo','categoria_id','status'];


}
