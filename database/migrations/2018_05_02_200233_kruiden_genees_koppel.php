<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class KruidenGeneesKoppel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('geneeskracht_koppeling',function(Blueprint $table){
            $table->integer('kruid_id')->unsigned();
            $table->integer('geneeskracht_id')->unsigned();
            $table->increments('id');

            $table->foreign('kruid_id')->references('id')->on('kruiden');
            $table->foreign('geneeskracht_id')->references('id')->on('geneeskracht');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('geneeskracht_koppeling',function( $table){
            $table->dropForeign(['kruid_id']);
            $table->dropForeign(['geneeskracht_id']);
        });
        Schema::dropIfExists('geneeskracht_koppeling');
    }
}
