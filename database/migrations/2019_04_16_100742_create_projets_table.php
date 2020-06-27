<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('num')->nullable();
            $table->string('province')->nullable();
            $table->string('commune')->nullable();
            $table->string('consistance')->nullable();
            $table->string('situation')->nullable();
            $table->string('petitionnaire')->nullable();
            $table->string('architecte')->nullable();
            $table->string('requisition')->nullable();
            $table->string('tf')->nullable();
            $table->text('observation')->nullable();
            $table->string('adresse')->nullable();
            $table->string('num_titre_foncier')->nullable();
            $table->string('superficie')->nullable();
            $table->string('hauteur')->nullable();
            $table->string('c_e_s')->nullable();
            $table->string('c_o_s')->nullable();
            $table->string('vf_technicien')->nullable();
            $table->string('vl_agentGU')->nullable();
            $table->integer('payement')->nullable();
            $table->integer('typeProjet_id')->unsigned();
            $table->foreign('typeProjet_id')->references('id')->on('type_projets')->onDelete('cascade');
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
        Schema::dropIfExists('projets');
    }
}
