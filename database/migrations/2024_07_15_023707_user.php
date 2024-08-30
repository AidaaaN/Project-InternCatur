<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    protected $table = 'user';
    public function up(): void
    {
        //
        Schema::create($this->table,function(Blueprint $table){
            $table->integer('id_user',true,false)->nullable(false);
            $table->string('email')->unique();
            $table->string('password',100)->nullable(false);
            $table->enum('level',['admin']);
            $table->rememberToken();
            $table->timestamps();
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
