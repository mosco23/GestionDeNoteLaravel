<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtudiantEvaluation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etudiant_evaluation', function (Blueprint $table) {
            $table->id();
            $table->foreignId('etudiant_id')->nullable()->contrained();
            $table->foreignId('evaluation_id')->nullable()->contrained();
            $table->decimal('note', 4, 2);
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
        Schema::dropIfExists('etudiant_evaluation');
    }
}
