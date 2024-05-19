<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOpportuniteStageTable extends Migration
{
    public function up()
    {
        Schema::create('opportunite_stage', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('opportunite_id');
            $table->unsignedBigInteger('stage_id');
            $table->foreign('opportunite_id')->references('id')->on('opportunites')->onDelete('cascade');
            $table->foreign('stage_id')->references('id')->on('stages')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('opportunite_stage');
    }
}
