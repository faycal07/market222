<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('lead_products', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('lead_id');
        $table->unsignedBigInteger('product_id');
        // Add other pivot table columns as needed
        $table->timestamps();

        // Define foreign keys
        $table->foreign('lead_id')->references('id')->on('leads')->onDelete('cascade');
        $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');

        // Add unique constraint to ensure a product can be assigned to a lead only once
        $table->unique(['lead_id', 'product_id']);
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lead_produit');
    }



};
