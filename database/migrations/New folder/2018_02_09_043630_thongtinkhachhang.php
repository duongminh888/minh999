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
            $table->string('ngaysinh')->nullable();
            $table->string('ngaycap')->nullable();
            $table->string('noicap')->nullable();
            $table->string('sacthuc')->nullable();
            $table->string('nghenghiep')->nullable();
            $table->string('diachihktt')->nullable();
            $table->string('diachiht')->nullable();
            $table->string('diachitheohktt')->nullable();
            $table->string('diachitheoht')->nullable();
            $table->string('baolanhhoten')->nullable();
            $table->string('baolanhcmnd')->nullable();
            $table->string('baolanhngaycap')->nullable();
            $table->string('baolanhnoicap')->nullable();
            $table->string('baolanhsdt')->nullable();
            $table->string('baolanhsacthuc')->nullable();
            $table->string('quanhemeup')->nullable();
            $table->string('tencongty')->nullable();
            $table->string('diachinoilam')->nullable();
            $table->string('chucvu')->nullable();
            $table->string('loaitsbd')->nullable();
            $table->string('loaikhac')->nullable();
            $table->string('motatheotsbd')->nullable();
            $table->string('motatsbd')->nullable();
            $table->string('giatridinhgia')->nullable();
            $table->string('tylechovay')->nullable();
            $table->string('thunhap')->nullable();
            $table->string('thunhapcuthe')->nullable();
            $table->string('songuoiphuthuoc')->nullable();
            $table->string('hinhthucnhanthunhap')->nullable();
            $table->string('motakh')->nullable();
            $table->string('motagdkh')->nullable();
            $table->string('chamdiem')->nullable();
            $table->string('ketquacic')->nullable();
            $table->string('duno')->nullable();
            $table->string('nosau')->nullable();
            $table->string('nhomno')->nullable();
            $table->string('thunhap1')->nullable();
            $table->string('thunhap2')->nullable();
            $table->string('thunhap3')->nullable();
            $table->string('thunhap4')->nullable();
            $table->string('thunhap5')->nullable();
            $table->string('danhgiatrano')->nullable();

            
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
