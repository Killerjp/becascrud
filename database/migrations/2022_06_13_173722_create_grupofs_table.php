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
        Schema::create('grupofs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_postulant')
            ->constrained('postulants'); 
            $table->foreignId('id_user')
            ->constrained('users');
            $table->integer('periodo');           
            $table->string('nombre_gf',30);
            $table->string('rut_gf',9);
            $table->integer('edad_gf');
            $table->string('parentesco_gf',20);
            $table->string('profesion_gf',20);
            $table->integer('ingresos_gf');
            $table->string('documento',200);
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
        Schema::dropIfExists('grupofs');
    }
};
