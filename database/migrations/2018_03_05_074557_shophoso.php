<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Shophoso extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shophoso', function (Blueprint $table) {
            $table->increments('id');
            $table->string('idmember');
            $table->string('hoten');
            $table->string('sdt');
            $table->string('cmt');
            $table->string('laimoingay')->nullable();
            $table->string('sotienphaitra')->nullable();
            $table->string('loaivay');
            $table->string('trangthaihopdong');
            $table->string('sotienvay');
            $table->string('songay');
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
        Schema::dropIfExists('shophoso');
    }
}
