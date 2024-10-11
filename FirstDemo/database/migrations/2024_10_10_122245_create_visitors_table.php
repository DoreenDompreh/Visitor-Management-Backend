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
            $table->string("title");
            $table->string("full_name");
            $table->string("company")->nullable();
            $table->integer("designation")->nullable();
            $table->string("phone_number");
            $table->string("email")->unique();
            $table->string("base_64image")->nullable();
            $table->string("number_of_visitors");
            $table->string("purpose");
            $table->boolean("is_recurring_visits")->default(false);
            $table->string("start_date");
            $table->string("end_date")->nullable();
            $table->unsignedBigInteger("host_id");
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
