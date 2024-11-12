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
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            
            // $table->foreign('user_id')->references('id')->on('users')->nullable()->onDelete('set null');
            // $table->foreign('product_id')->references('id')->on('products')->nullable()->onDelete('set null');
            $table->integer('user_id');
            $table->integer('product_id');
            $table->integer('qty')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
