<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    protected $table = 'surat_penawaran';
    public function up(): void
    {
        //
        Schema::create($this->table,function(Blueprint $table){
            $table->integer('id_surat_penawaran',true,false)->nullable(false);
            $table->integer('id_user',false,false)->nullable(false);
            $table->string('nama_surat')->nullable(false);
            $table->text('isi_surat')->nullable(false);
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
