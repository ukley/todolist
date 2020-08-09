@extends('layout.master')

    @section('content')

        @if(session('status'))
            <div class="alert alert-success">
                <div class="row">
                    <div class="col s12 m12 l12">
                        <div class="row">
                            <div class="m12 s12 col">
                                <div class="card-panel deep-orange darken-1">
                                    <div class="row">
                                        <div class="col l8 white-text">
                                            <h5>Tarefa Adicionada</h5>
                                            <h6>Acompanhe na lista de tarefas e aguarde o lembrete</h6>
                                        </div>
                                        <div class="col l4 right-align">
                                            <br>
                                            <a href="/tarefas/listar" class="btn right waves-light grey hide-on-small-only">  <i class="fas fa-arrow-left"></i> Voltar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
            </div>
        @endif



        {{ Form::open(['url' => 'tarefas/adicionar']) }}
            <div class="card-panel">
                <h4 class="header2"><strong>Dados da Tarefa</strong></h4>
                <div class="row">
                    <div class="col s12 m12 l12">

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="row">
                            <div class="input-field col s12 m6 l6">
                                <input class="uppercase" name="titulo" type="text" maxlength="200" required>
                                <label for="titulo" class="">Titulo</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12 m2 l2">
                                <input class="uppercase" name="dataEvento" type="text" placeholder="00-00-0000" id="data" maxlength="10" required>
                                <label for="data" class="">Data Tarefa</label>
                            </div>


                            <div class="input-field col s12 m2 l2">
                                <input class="uppercase" name="inicial" id="time" placeholder="00:00" type="text"
                                       maxlength="5" required>
                                <label for="inicial" class="">Horario Inicial</label>
                            </div>

                            <div class="input-field col s12 m2 l2">
                                <input class="uppercase" name="final" type="text" placeholder="00:00" id="timeFinal" maxlength="5" required>
                                <label for="final" class="">Horario Final</label>
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12 m6 l6">
                            <div class="input-field col s12">
                                    {{Form::select('categoria',$categorias,[''])}}
                                <label>Categoria</label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12 m6 l6">
                            <textarea id="textarea1" class="materialize-textarea" name="conteudo" required></textarea>
                            <label for="textarea1">Tarefa</label>
                        </div>
                    </div>
                    <div class="col s12 m12 l12">
                        <p class="z-depth-2 mb-1 divider"></p>
                        <button data-target="ModalProloader" class="btn blue waves-effect waves-light left modal-trigger" type="submit">
                            Cadastrar
                            <i class="material-icons right">send</i>
                        </button>


                    </div>
                </div>
            </div>
        {{ Form::close() }}

@section('script')
    {!! Html::script('/assets/tarefa.js') !!}
@stop


    @endsection
