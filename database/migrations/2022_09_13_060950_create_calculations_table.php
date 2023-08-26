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
        Schema::create('calculations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('inquiry_id')
                ->index()
                ->constrained('inquiries')
                ->restrictOnDelete();
            $table->foreignId('supplier_id')
                ->index()
                ->constrained('suppliers')
                ->restrictOnDelete();
            $table->unsignedDecimal('buying_price', 14, 2)->default(0);
            $table->string('buying_currency');
            $table->unsignedDecimal('buying_total_price_aed', 14, 2)->default(0);
            $table->unsignedDecimal('quoted_price', 14, 2)->default(0);
            $table->string('quoted_currency');
            $table->unsignedDecimal('quoted_price_aed', 14, 2)->default(0);
            $table->unsignedDecimal('actual_ordered_price_aed', 14, 2)->default(0);
            $table->unsignedBigInteger('qty');
            $table->boolean('is_extra')->index()->default(0);
            $table->foreignId('created_by')
                ->constrained('users')
                ->restrictOnDelete();
            $table->softDeletes();
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
        Schema::dropIfExists('calculations');
    }
};
