<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password',65);
            $table->string('nama',40)->nullable();
            $table->string('nik',40)->nullable();
            $table->string('devisi',30)->nullable();
            $table->string('posisi',30)->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->enum('sex',['m','f'])->nullable();
            $table->longText('alamat')->nullable();
            $table->string('phone',15)->nullable();
            $table->enum('role',['admin','pegawai'])->default('pegawai');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
