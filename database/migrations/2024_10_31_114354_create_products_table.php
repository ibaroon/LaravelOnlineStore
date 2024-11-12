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
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->foreignId('category_id')->nullable()->constrained()->onDelete('set null');// foreignId => refare to categories table 
          //$table->foreign('cat_id')->references('id')->on('categories'); 
            $table->string('name');
            $table->string('slug');
            $table->mediumText('short_description');
            $table->longtext('description');
            $table->string('price');
            $table->string('selling_price');
            $table->text('image');
            $table->string('qty');
            $table->string('tax');
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('trend')->default(0);
            $table->mediumText('meta_title');
            $table->longtext('meta_description');
            $table->mediumText('meta_keywords');

            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
