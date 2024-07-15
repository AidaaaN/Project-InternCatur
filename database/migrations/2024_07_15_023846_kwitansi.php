<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    protected $table = 'kwitansi';
    public function up(): void
    {
        //
        Schema::create($this->table, function(Blueprint $table){
            $table->integer('id_kwitanse',true,false)->nullable(false);
            $table->integer('id_user',false.false)->nullable(false);
            $table->string('nama_penerima',100)->nullable(false);
            $table->decimal('nominal',10,2,false)->nullable(false);
            $table->date('tgl_kwitansi',0)->nullable(false);
            //foreign key
            $table->foreign('id_user','ConstraintIdUser')->on('user')->references('id_user')->onUpdate('cascade')->onDelete('cascade');
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
