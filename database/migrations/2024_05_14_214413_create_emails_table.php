<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emails', function (Blueprint $table) {
            $table->id();
            $table->string('from')->nullable();
            $table->string('to');
            $table->string('subject');
            $table->text('body'); // HTML or plaintext content
            $table->string('attachments')->nullable(); // JSON or serialized data for attachments
            $table->unsignedBigInteger('template_id')->nullable();
            $table->timestamps();


            $table->foreign('template_id')->references('id')->on('templates')->onDelete('set null');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('emails', function (Blueprint $table) {
            // Supprimer la contrainte de clé étrangère
            $table->dropForeign(['template_id']);

            // Supprimer la colonne template_id
            $table->dropColumn('template_id');
        });
    }
}

