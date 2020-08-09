<?php

namespace Tests\Unit;

use App\Model\Tarefa;
use App\Repositories\TarefaRepository;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ListarTarefasTest extends TestCase
{

    /** @test */
    public function listar_todas_tarefaTest()
    {
        $resultado=Tarefa::All();
        $response = $this->json('GET', '/tarefas/listar');
            $response->assertStatus(200);
    }

    /** @test */
    public function adicionar_uma_tarefaTest()
    {
        $response = $this->post('/tarefas/adicionar', [
            'titulo' => 'Lorem Ipsum',
            'conteudo' => 'Lorem Ipsum ',
            'categoria_id' => 1,
            'status' => 'A'
        ]);
        $response->assertOk();
    }

    /** @test */
    public function testIndex(){
        $response=$this->get('/tarefas/listar')
        ->assertStatus(200);
    }

    /** @test */
    function testAtualizarTarefaTest() {
        $response = $this->put('/tarefas/atualizar/1', [
            'titulo' => 'Lorem Ipsum',
            'conteudo' => 'Lorem Ipsum ',
            'categoria_id' => 1,
            'status' => 'A'
        ]);
        $response->assertOk();

    }



}
