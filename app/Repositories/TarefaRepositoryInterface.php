<?php

namespace App\Repositories;

interface TarefaRepositoryInterface
{
    public function listar();

    public function adicionar($request);

    public function atualizar($request, $id);

    public function filtro($id);

    public function visualizar($id);

    public function finalizarTarefa($request, $id);

    public function realizarAtualizacao($idTarefa);

    }
