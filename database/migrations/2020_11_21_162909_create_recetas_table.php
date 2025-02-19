<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category', function(Blueprint $table){
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('recetas', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('preparation');
            $table->text('ingredients');
            $table->string('image');
            $table->foreignId('user_id')->references('id')->on('users')->comment('El usuario que crea la receta');
            $table->foreignId('category_id')->references('id')->on('category')->comment('La categoria de la receta creada');
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
        Schema::dropIfExists('recetas');
        Schema::dropIfExists('category');
    }
}
