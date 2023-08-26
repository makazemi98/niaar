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
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->morphs('fileable');
            $table->string('url');
            $table->string('title')->nullable();
            $table->string('name');
            $table->float('size', 10, 2);
            $table->enum('type', \App\Enums\InquiryDocsCollectionEnum::values())->nullable();
            $table->foreignId('created_by')
                ->constrained('users')
                ->restrictOnDelete();
            // $table->foreignId('inquiry_id')
            //     ->index()
            //     ->constrained('inquiries')
            //     ->cascadeOnDelete();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('files');
    }
};
