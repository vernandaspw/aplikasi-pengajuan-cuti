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
        Schema::create('pengajuans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('jenis_pengajuan_id')->nullable()->constrained('jenis_pengajuans')->onUpdate('cascade')->onDelete('set null');
            $table->foreignId('subjenis_pengajuan_id')->nullable()->constrained('subjenis_pengajuans')->onUpdate('cascade')->onDelete('set null');
            $table->date('start_date');
            $table->date('end_date');
            $table->decimal('jumlah_hari',6,2)->nullable();
            $table->longText('keterangan')->nullable();
            $table->enum('status', ['menunggu','approve','reject']);
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
        Schema::dropIfExists('pengajuans');
    }
};
