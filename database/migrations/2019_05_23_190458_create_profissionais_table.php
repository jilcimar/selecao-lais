<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfissionaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profissionais', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome');
            $table->char('cns','15');
            $table->date('data_atribuicao');
            $table->string('carga_horaria');
            $table->boolean('sus');

           // FK's
            $table->integer('cbo_id');
            $table->integer('tipo_id');
            $table->integer('vinculacao_id');

            $table->foreign('cbo_id')->references('id')->on('cbos')->onDelete('cascade');
            $table->foreign('tipo_id')->references('id')->on('tipos')->onDelete('cascade');
            $table->foreign('vinculacao_id')->references('id')->on('vinculacoes')->onDelete('cascade');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profissionais');
    }
}
