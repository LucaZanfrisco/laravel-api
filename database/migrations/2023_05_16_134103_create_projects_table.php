<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Spatie\FlareClient\Flare;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('nome')->unique();
            $table->string('immagine')->nullable();
            $table->text('descrizione')->nullable();
            $table->date('data_di_creazione');
            $table->string('slug');
            $table->boolean('completato')->default(false);
            $table->boolean('riscosso')->default(false);
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
        Schema::dropIfExists('projects');
    }
};
