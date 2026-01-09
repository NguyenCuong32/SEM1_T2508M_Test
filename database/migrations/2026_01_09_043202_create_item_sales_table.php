<?php
// database/migrations/xxxx_xx_xx_create_item_sale_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('item_sale', function (Blueprint $table) {
            $table->id();
            $table->string('item_code', 6);
            $table->string('item_name', 50);
            $table->decimal('quantity', 10, 2)->nullable();
            $table->date('expried_date')->nullable();
            $table->string('note', 60)->nullable();
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('item_sale');
    }
};

