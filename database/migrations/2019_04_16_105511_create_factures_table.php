<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factures', function (Blueprint $table) {
            $table->increments('id');
            $table->string('montant')->nullable();
            $table->string('notif_fact')->nullable();
            $table->integer('taxe_id')->unsigned()->nullable();
            $table->foreign('taxe_id')->references('id')->on('taxes')->onDelete('cascade');
            $table->integer('projet_id')->unsigned()->index();
            $table->foreign('projet_id')->references('id')->on('projets')->onDelete('cascade');

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
        Schema::dropIfExists('factures');
    }
}
