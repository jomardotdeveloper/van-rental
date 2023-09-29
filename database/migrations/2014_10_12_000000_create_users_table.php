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
            $table->integer('role'); //user - 1, driver - 2, admin - 3
            $table->string('firstname');
            $table->string('lastname');
            $table->string('middlename')->nullable();
            $table->string('gender')->nullable();
            // $table->integer('age')->nullable();
            $table->string('birthplace')->nullable();
            $table->string('nationality')->nullable();
            $table->bigInteger('contact');
            $table->string('email')->unique();
            // for otp
            $table->boolean('is_activated')->default(0);
            $table->boolean('show_to_dashboard')->default(1);
            $table->date('birthdate');
            $table->string('municipality');
            $table->bigInteger('zipcode');
            $table->string('barangay');
            $table->string('street');
            $table->string('password');
            $table->string('idno')->nullable();
            $table->string('orcr')->nullable();
            $table->string('platenumber')->nullable();
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
