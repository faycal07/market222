<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('compagne_lead', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lead_id');
            $table->unsignedBigInteger('compagne_id');

            // Foreign keys
            $table->foreign('lead_id')->references('id')->on('leads')->onDelete('cascade');
            $table->foreign('compagne_id')->references('id')->on('compagnes')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('compagne_lead');
    }
};
