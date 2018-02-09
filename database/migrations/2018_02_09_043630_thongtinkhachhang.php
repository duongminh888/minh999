<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Thongtinkhachhang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thongtinkhachhang', function (Blueprint $table) {
            $table->increments('id');
            $table->string('idmember');
            $table->string('diachi')->nullable();
            $table->string('ngaysinh')->nullable();
            $table->string('ngaycap')->nullable();
            $table->string('noicap')->nullable();
            $table->string('gioitinh')->nullable();
            $table->string('email')->nullable();
            $table->string('loaidienthoai')->nullable();
            $table->string('tennguoithan')->nullable();
            $table->string('quanhenguoithan')->nullable();
            $table->string('sdtnguoithan')->nullable();
            $table->string('luongtb')->nullable();
            $table->string('hopdong')->nullable();
            $table->string('mathenh')->nullable();
            $table->string('nghenghiep')->nullable();
            $table->string('nhomnganhnghe')->nullable();
            $table->string('sdtnoilam')->nullable();
            $table->string('loaithanhtoan')->nullable();
            $table->string('tennganhang')->nullable();
            $table->string('chinhanh')->nullable();
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
        Schema::dropIfExists('thongtinkhachhang');
    }
}
