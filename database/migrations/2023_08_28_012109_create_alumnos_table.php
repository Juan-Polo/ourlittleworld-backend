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
        Schema::create('alumnos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')->onDelete('cascade');


            $table->unsignedBigInteger('padre_id');
            $table->foreign('padre_id')
                ->references('id')
                ->on('padres')->onDelete('cascade');


            $table->unsignedBigInteger('degree_id');
            $table->foreign('degree_id')
                ->references('id')
                ->on('degrees')->onDelete('cascade');
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
        Schema::dropIfExists('alumnos');
    }
};
