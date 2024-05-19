<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->string('nom')->nullable();
            $table->string('email')->unique();
            $table->string('tel')->nullable();
            $table->unsignedBigInteger('types_id')->nullable();
            $table->unsignedBigInteger('sources_id')->nullable();
            $table->unsignedBigInteger('opportunite_id')->nullable();
            $table->unsignedBigInteger('stage_id')->nullable();



            $table->foreign('types_id')->references('id')->on('lead_types');

            $table->foreign('sources_id')->references('id')->on('lead_sources');
            $table->foreign('opportunite_id')->references('id')->on('opportunites');


            // Clé étrangère

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
        Schema::dropIfExists('leads');
    }
};
