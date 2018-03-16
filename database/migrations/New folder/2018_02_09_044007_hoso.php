<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Hoso extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoso', function (Blueprint $table) {
            $table->increments('id');
            $table->string('idmember');
            $table->string('laimoingay')->nullable();
            $table->string('mucdichvay')->nullable();
            $table->string('sotienphaitra')->nullable();
            $table->string('hinhthuccaptindung')->nullable();
            $table->string('desuat')->nullable();
            $table->string('danhgiasotienvay')->nullable();
            $table->string('boxtinchap')->nullable();
            $table->string('texttinchap')->nullable();
            $table->string('boxduatrentsbd')->nullable();
            $table->string('textduatrentsbd')->nullable();
            $table->string('thoihanvayvon')->nullable();
            $table->string('giaingan')->nullable();
            $table->string('giaytogoc')->nullable();
            $table->string('pgd');
            $table->string('loaivay');
            $table->string('trangthaihopdong');
            $table->string('stt');
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
        Schema::dropIfExists('hoso');
    }
}
