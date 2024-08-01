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
        Schema::create('register_otps', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->integer('otp');
            $table->tinyInteger('is_active')->default(1);
            $table->tinyInteger('limit')->default(3);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('register_otps');
    }
};
