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
        Schema::create('bookeds', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('sender_id');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('middlename')->nullable();
            $table->string('contact');
            $table->string('email');
            $table->string('destination');
            $table->string('pickup');
            $table->string('landmark');
            $table->date('dateoftrip');
            $table->integer('pax');
            $table->integer('daysandhours');
            $table->time('pickuptime');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookeds');
    }
};
