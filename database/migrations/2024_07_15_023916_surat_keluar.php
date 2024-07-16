<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    protected $table = 'surat_keluar';
    public function up(): void
    {
        //
        Schema::create($this->table,function(Blueprint $table){
            $table->integer('id_surat_keluar',true,false)->nullable(false);
            $table->integer('id_user',false,false)->nullable(false);
            $table->dateTime('tgl_keluar',0)->default('2024-01-01')->nullable(false);
            $table->string('nama_surat',100)->nullable(false);
            $table->text('perihal')->nullable(true);
            //foreign key
            $table->foreign('id_user',)->on('user')->references('id_user')->onUpdate('cascade')->onDelete('cascade');
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
