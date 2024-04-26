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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('sr_code')->nullable();
            $table->string('year_level')->nullable();
            $table->string('department')->nullable();
            $table->string('gsuite_email')->unique()->nullable();
            $table->text('fp_user')->nullable();
            $table->string('gender')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('branch')->nullable();
            $table->string('user_type')->nullable();
            $table->string('password')->nullable();
            $table->string('is_Active')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
