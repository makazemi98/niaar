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
        Schema::create('future_dues', function (Blueprint $table) {
            $table->id();
            $table->foreignId('inquiry_id')
                ->index()
                ->constrained('inquiries')
                ->cascadeOnDelete();
            $table->enum('bill_to', \App\Enums\BillToEnum::values())->index();
            $table->string('payee_name');
            $table->decimal('payable_amount', 14, 2)->default(0);
            $table->decimal('receivable_amount', 14, 2)->default(0);
            $table->string('currency');
            $table->date('due_date')->index();
            $table->boolean('is_paid')->default(0);
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
        Schema::dropIfExists('future_dues');
    }
};
