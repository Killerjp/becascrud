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
        Schema::create('postulants', function (Blueprint $table) {
            $table->id();
            $table->string('rut_post', 10);
            $table->string('nombre_post', 30);
            $table->foreignId('periodo_id')
                  ->constrained('periodos');
            $table->foreignId('users_id')
                  ->constrained('users');            
            $table->string('curso_post', 30);
            $table->string('apod_post', 40);
            $table->string('correoapo_post', 40);
            $table->string('descuento_post');
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
        Schema::dropIfExists('postulants');
    }
};
