<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovementComptableGlobalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movement_comptable_globals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('f_id');
            $table->string('code');
            $table->string('libelle');
            $table->string('m_credit_total');
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->foreign('f_id')->references('f_id')->on('folder_comptables');
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
        Schema::dropIfExists('movement_comptable_globals');
    }
}
