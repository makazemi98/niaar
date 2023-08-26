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
        Schema::create('question_response_time', function (Blueprint $table) {
            $table->id();
            $table->foreignId('questioner')
                ->index()
                ->constrained('users')
                ->cascadeOnDelete();

            $table->foreignId('inquiry_id')
                ->index()
                ->constrained('inquiries')
                ->cascadeOnDelete();

            $table->foreignId('asked_in')
                ->index()
                ->constrained('comments')
                ->cascadeOnDelete();

            $table->foreignId('questioned')
                ->index()
                ->constrained('users')
                ->cascadeOnDelete();

            $table->foreignId('replayed_in')
                ->index()
                ->nullable()
                ->constrained('comments')
                ->cascadeOnDelete();

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
        Schema::dropIfExists('question_response_time');
    }
};
