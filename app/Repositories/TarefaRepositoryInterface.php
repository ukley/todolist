<?php

namespace App\Repositories;

interface TarefaRepositoryInterface
{
    public function listar();

    public function adicionar($request, $id);

    public function atualizar($request, $id);

    public function filtro($id);

    public function finalizarTarefa($request, $id);
}
