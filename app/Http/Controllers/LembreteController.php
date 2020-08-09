<?php

namespace App\Http\Controllers;

use App\Model\Horario;
use App\Model\Tarefa;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;

class LembreteController extends Controller
{
    public function acionarLembrete(){
        $data=Carbon::now()->format('Y-m-d');
        $horario=Carbon::now()->format('h:m');

        $tarefa=DB::table('tarefas')
            ->join('horarios', 'tarefas.id', '=', 'horarios.tarefa_id')
            ->select(DB::raw('DATE_FORMAT(horarios.inicial, "%H:%i") as hora'),'tarefas.*')
            ->get();

        foreach ($tarefa as $item) {
            return $data;
            if (($data == $item->dataEvento) && ($horario == $item->hora)) {

                dd($item);
                return response()->json([$item->titulo]);
                //return $item->dataEvento;
            }
        }
    }
}
