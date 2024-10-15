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
        Schema::create('visitors', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('full_name');
            $table->string('company')->nullable();
            $table->string('designation')->nullable();
            $table->string('phone_number');
            $table->string('email')->unique();
            $table->string('base_64image')->nullable();
            $table->string('number_of_visitors')->nullable();
            $table->string('purpose')->nullable();
            $table->string('is_recurring_visits')->default();
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();
            $table->string('host_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visitors');
    }
};
