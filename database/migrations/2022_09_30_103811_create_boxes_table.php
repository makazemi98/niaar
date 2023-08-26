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
        Schema::create('boxes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('shipping_id')
                ->index()
                ->constrained('shippings')
                ->cascadeOnDelete();
            $table->foreignId('client_id')
                ->index()
                ->constrained('users')
                ->cascadeOnDelete();
            $table->foreignId('inquiry_id')
                ->index()
                ->constrained('inquiries')
                ->cascadeOnDelete();
            $table->string('sign');
            $table->string('content');
            $table->unsignedFloat('height');
            $table->unsignedFloat('length');
            $table->unsignedFloat('width');
            $table->unsignedFloat('volume');
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
        Schema::dropIfExists('boxes');
    }
};
