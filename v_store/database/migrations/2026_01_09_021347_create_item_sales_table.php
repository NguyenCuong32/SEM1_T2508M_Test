<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('item_sale', function (Blueprint $table) {
            $table->id();
            $table->string('item_code', 6)->unique();
            $table->string('item_name', 50)->unique();
            $table->integer('quantity'); // Changed to integer as per requirement
            $table->string('unit', 20)->default('Piece');
            $table->date('product_date')->nullable(); // Manufacture date
            $table->date('expried_date'); // Typo as per exam requirement
            $table->string('note', 255)->nullable();
            // Schema didn't mention timestamps, so omitting $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_sale');
    }
};
