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
            $table->integer('id_user',false,false)->index('IdArsipUser')->nullable(false);
            $table->varchar('nama_surat',100)->nullable(false);
            $table->date('tgl_arsip',0)->nullable(false);
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
