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
        Schema::table('users', function (Blueprint $table) {
            $table->string('contact_person')->nullable()->after('renewal_date');
            $table->string('mobile_number')->nullable()->after('contact_person');
            $table->string('company_name')->nullable()->after('mobile_number');
            $table->string('company_number')->nullable()->after('company_name');
            $table->string('contact_name_2')->nullable()->after('company_number');
            $table->string('mobile_number_2')->nullable()->after('contact_name_2');
            $table->string('company_abbreviation')->nullable()->after('mobile_number_2');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
