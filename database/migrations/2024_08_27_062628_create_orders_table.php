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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('user_id')->nullable();

            $table->string('product_image')->nullable(); // Add the product_image column


            $table->string('product_title')->nullable();
            $table->string('product_code')->nullable();
            $table->string('quantity')->nullable();
            $table->string('price', 8, 2)->nullable();
            $table->string('total_price', 8, 2)->nullable();
            $table->string('delivery_charge', 8, 2)->nullable()->default(0);
            // $table->string('image')->nullable();
            $table->string('thana')->nullable();
            $table->string('district')->nullable();
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');

            $table->string('payment_status')->nullable();
            $table->string('delivery_status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
        // $table->dropColumn('product_image');

    }
};
