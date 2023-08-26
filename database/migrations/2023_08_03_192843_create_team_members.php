<?php

use App\Enums\RolesEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamMembers extends Migration

{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('team_members', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user')
                ->index()
                ->constrained('users')
                ->cascadeOnDelete();

            $table->foreignId('inquiry')
                ->index()
                ->constrained('inquiries')
                ->cascadeOnDelete();

            $table->enum('role', RolesEnum::values())->default(RolesEnum::CLIENT->value);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('team_members');
    }
};
