<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Photo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('fotos',function(Blueprint $table){
            $table->increments('id');
            $table->integer('kruid_id')->unsigned();
            $table->string('url');
            $table->enum('type',[5,4,3,2,1]);
            $table->foreign('kruid_id')->references('id')->on('kruiden');
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
        //
        Schema::table('fotos',function( $table){
            $table->dropForeign(['kruid_id']);
        });
        Schema::dropIfExists('fotos');
    }
}
