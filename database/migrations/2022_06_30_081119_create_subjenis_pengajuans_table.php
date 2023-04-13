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
        Schema::create('subjenis_pengajuans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jenis_pengajuan_id')->constrained('jenis_pengajuans')->onUpdate('cascade')->onDelete('cascade');
            $table->string('nama',30);
            $table->longText('keterangan')->nullable();
            $table->decimal('kuota',5,2)->nullable();
            $table->boolean('status')->default(true);
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
        Schema::dropIfExists('subjenis_pengajuans');
    }
};
