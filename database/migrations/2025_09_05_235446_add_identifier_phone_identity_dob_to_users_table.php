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
        Schema::table('users', function (Blueprint $table) {
            $table->string('identifier')->unique();
            $table->string('phone_number')->nullable();
            $table->string('identity_card')->nullable();
            $table->date('date_of_birth')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('identifier');
            $table->dropColumn('phone_number');
            $table->dropColumn('identity_card');
            $table->dropColumn('date_of_birth');
        });
    }
};
