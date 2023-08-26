<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplier_product_categories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('supplier_id')
                ->index()
                ->constrained('suppliers')
                ->restrictOnDelete();

            $table->foreignId('product_category_id')
                ->index()
                ->constrained('product_categories')
                ->restrictOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('supplier_product_categories');
    }
};
