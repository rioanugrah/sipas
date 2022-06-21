<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratMasukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_masuk', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('user_pengirim_id')->nullable();
            $table->uuid('user_terima_id')->nullable();
            $table->string('nomor_surat_masuk');
            $table->string('nomor_agenda_surat_masuk');
            $table->string('asal_surat');
            $table->string('isi_ringkasan');
            $table->string('keterangan');
            $table->uuid('klasifikasi_id');
            $table->date('tanggal_surat');
            $table->date('tanggal_terima');
            $table->enum('status',['Open','Close']);
            $table->string('status_surat');
            $table->string('file');
            $table->timestamps();
            $table->softDeletes();
            
            //Foreign Key
            // $table->foreign('klasifikasi_id')->references('id')->on('klasifikasi');
            // $table->foreign('user_pengirim_id')->references('id')->on('users');
            // $table->foreign('user_terima_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('surat_masuk');
    }
}
