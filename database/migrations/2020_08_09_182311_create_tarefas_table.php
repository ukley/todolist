<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTarefasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('tarefas', function (Blueprint $table) {
                $table->increments('id');
                $table->string('titulo',200);
                $table->char('lembrete',1)->nullable();
                $table->text('conteudo');
                $table->date('dataEvento');
                $table->char('status',1)->nullable();
                $table->unsignedInteger('categoria_id');
                $table->timestamps();
                $table->foreign('categoria_id')->references('id')->on('categorias');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tarefas');
    }
}
