@extends('layout.master')

<?php setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
?>

@section('content')

    <div class="row">
        <div class="col s6 m10 l6">
        <h1 class="header2"><strong> <i class="large material-icons" style=" vertical-align: middle;">insert_chart</i>
                Tarefas</strong></h1>
        </div>

        <div class="col s6 m2 l6">
            <h4 style="float: right;margin-top:50px;font-weight:bold"><a href="{{route('adicionar')}}" class="btn btn-medium waves-effect waves-light" ><i class="large material-icons" style=" vertical-align: middle;">add</i>Adicionar Tarefa</a></h4>

       </div>
    </div>

    <div id="lembrete"></div>

    <div class="card-panel mt-1">
        <div class="row">
            <form action='/tarefas/filtrar' method="get">
                <div class="col s12 m12 l12">
                    <h4 class="header2"><strong>Informe Categoria</strong></h4>
                    <div class="row">
                        <div class="input-field col s12 m4 l4">
                            <select name="cat">
                                <option value="" disabled selected>Selecione Categoria</option>
                                <option value="1">Casa</option>
                                <option value="2">Rua</option>
                                <option value="3">Trabalho</option>
                            </select>
                            <label>Filtrar</label>
                        </div>

                        <div class="input-field col s12 m4 l4">
                            <div class="input-field col s12">
                                <button class="btn blue waves-effect waves-light" type="submit"
                                        id="btnPesquisar">
                                    <i class="fas fa-search"></i>
                                </button>


                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <div class="row">
        <table class="striped highlight responsive-table" >
            <thead>
            <tr class="uppercase">
                <th class="center-align">Tarefa</th>
                <th class="center-align">Quando</th>
                <th class="center-align">Inicio</th>
                <th class="center-align">Fim</th>
                <th class="center-align">Categoria</th>

                <th class="center-align"><i class="fas fa-bolt"></i> Ações</th>
            </tr>
            </thead>
    @foreach($lista as $item)
            <tbody>
            <tr>
                <td class="center-align">{{strtoupper($item->titulo)}}</td>
                <td class="center-align">{{utf8_encode(ucfirst(strftime('%A, %d de %B ', strtotime($item->dataEvento))))}}</td>
                <td class="center-align">{{$item->inicial}}</td>
                <td class="center-align">{{$item->final}}</td>
                <td class="center-align">{{$item->categorias}}</td>

                <td class="center-align">
                    <a href="{{route('ver',[$item->tarefa_id])}}" class="btn-floating btn-medium waves-effect waves-light tooltipped cyan" data-position="top" data-tooltip="Visualizar Tarefas"><i class="material-icons">search</i></a>
                    <a href="{{route('update',[$item->tarefa_id])}}" class="btn-floating btn-medium waves-effect waves-light tooltipped green" data-position="top" data-tooltip="Alterar Tarefas"><i class="material-icons">edit</i></a>
                    <a href="{{route('limpar-tarefa',[$item->tarefa_id])}}"  class="btn-floating btn-medium waves-effect waves-light tooltipped pink" data-position="top" data-tooltip="Limpar Tarefas"><i class="material-icons">close</i></a>

                </td>
            </tr>

            </tbody>
            @endforeach
        </table>



<script>
        function acionarLembrete() {
                fetch('http://localhost:9090/api/lembrete/acionar')
                    .then(function (response) {
                        response.json().then(function (data) {
                           if(data !=null){
                                   $("#lembrete").append('<li>'+'Vc possui uma tarefa agendada hj as+'+data['titulo']+'</li>');

                           }
                        });
                    })
                    .catch(function (err) {
                        console.error(err);
                    });
            }

             //setInterval(acionarLembrete,5000);
             //clearInterval(acionarLembrete());



        </script>



@endsection

