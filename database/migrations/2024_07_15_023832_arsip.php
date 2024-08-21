<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    protected $table = 'arsip';
    public function up(): void
    {
        //
        Schema::create($this-> table, function(Blueprint $table){
            $table->integer('id_arsip',true,false)->nullable(false);
            $table->string('nama_surat',100)->nullable(false);
            $table->string('nomor_surat',100)->nullable(false);
            $table->date('tgl_arsip',0)->nullable(false);
            $table->string('tujuan_surat',100)->nullable(false);
            $table->string('jenis_surat',100)->nullable(false);
            $table->string('keterangan',100)->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists($this->table);
    }
};
