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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('inquiry_id')
                ->index()
                ->nullable() // Balance sheet doesn't have inquiry id
                ->constrained('inquiries')
                ->cascadeOnDelete();
            $table->mediumText('description')->nullable();
            $table->unsignedDecimal('debit', 14, 2)->default(0);
            $table->unsignedDecimal('credit', 14, 2)->default(0);
            $table->decimal('balance', 14, 2)->default(0);
            $table->date('date')->nullable();
            $table->boolean('is_paid')->default(0);
            $table->string('invoice_no')->nullable();
            $table->enum('type', \App\Enums\PaymentTypeEnum::values())->index();
            $table->enum('tab', \App\Enums\PaymentTabsEnum::values())->index();
            $table->foreignId('created_by')
                ->constrained('users')
                ->cascadeOnDelete();
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
        Schema::dropIfExists('payments');
    }
};
