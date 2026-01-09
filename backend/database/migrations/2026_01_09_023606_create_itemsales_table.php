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
        Schema::create('itemsales', function (Blueprint $table) {
            $table->id();
            $table->string('item_code', 6);
            $table->string('item_name', 60);
            $table->decimal('quantity', 8, 2);
            $table->date('expried_date');
            $table->string('note', 60)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('itemsales');
    }
};
