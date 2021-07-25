<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParcoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parcours', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mention_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('semestre_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('niveau_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('specialite_id')->nullable()->constrained()->onDelete('cascade');
            $table->mediumText('code');
            $table->mediumText('libelle');
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
        Schema::dropIfExists('parcours');
    }
}
