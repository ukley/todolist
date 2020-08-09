@extends('layout.master')

@section('content')



                <div class="card-panel">
                    <h4 class="header2"><strong>Dados da Tarefa</strong></h4>

                    @foreach($info as $item)
                    <div class="row">
                        <div class="col s12 m12 l12">

                            <div class="row">
                                <div class="input-field col s12 m6 l6">
                                    <input class="uppercase"  type="text"  value="{{$item->titulo}}" readonly>
                                    <label for="titulo" class="">Titulo</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12 m6 l6">
                                    <input class="uppercase"  type="text"  value="{{$item->categorias}}" readonly>
                                    <label for="titulo" class="">Categoria</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12 m2 l2">
                                    <input class="uppercase"  type="text" value="{{date('d-m-Y',strToTime($item->dataEvento))}}" readonly>
                                    <label for="data" class="">Data Tarefa</label>
                                </div>


                                <div class="input-field col s12 m2 l2">
                                    <input class="uppercase"  type="text" value="{{$item->inicial}}" readonly>
                                    <label for="inicial" class="">Horario Inicial</label>
                                </div>

                                <div class="input-field col s12 m2 l2">
                                    <input class="uppercase" name="final" type="text" value="{{$item->final}}" readonly>
                                    <label for="final" class="">Horario Final</label>
                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12 m6 l6">
                                <label for="final" class="">Tarefa</label><br>
                                <p>{{$item->conteudo}} </p>

                            </div>
                        </div>





                    </div>
                </div>@endforeach


@endsection
