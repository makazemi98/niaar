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
        Schema::table('payments', function (Blueprint $table) {
            $table->foreignId('supplier_id')
                ->after('tab')
                ->index()
                ->nullable()
                ->constrained('suppliers')
                ->restrictOnDelete();
            $table->string('category')
                ->after('supplier_id')
                ->nullable()
                ->index();

            $table->foreignId('customer_id')
                ->after('category')
                ->nullable()
                ->index();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->dropColumn(['supplier_id', 'category', 'customer_id']);
        });
    }
};
