<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstansiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instansi', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nama_instansi');
            $table->string('nama_lembaga');
            $table->text('alamat_instansi');
            $table->integer('status_instansi');
            $table->string('nama_kepala_instansi');
            $table->string('nip_instansi');
            $table->string('email_instansi');
            $table->string('telp_instansi');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('instansi');
    }
}
