<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistrasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrasi', function (Blueprint $table) {
            $table->string('no_rawat',15);     
            $table->date('tgl_regis');        
            $table->string('no_rkm_medis',10);     
            $table->string('kd_dokter',10);  
            $table->foreign('kd_dokter')->references('kd_dokter')->on('dokter');             
            $table->string('kd_poli',10);  
            $table->foreign('kd_poli')->references('kd_poli')->on('poli'); 
            $table->enum('jenis_bayar',['BPJS','UMUM']);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registrasi');
    }
}
