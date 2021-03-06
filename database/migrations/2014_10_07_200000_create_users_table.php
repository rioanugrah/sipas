<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            // $table->id();
            $table->uuid('id')->primary();
            $table->string('username')->nullable();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->uuid('instansi_id')->nullable();
            $table->uuid('unit_kerja_id')->nullable();
            $table->rememberToken();
            $table->enum('is_active',['1','0'])->default('1')->nullable();
            $table->integer('is_role')->nullable();
            $table->timestamps();

            // $table->foreign('instansi_id')->references('id')->on('instansi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
