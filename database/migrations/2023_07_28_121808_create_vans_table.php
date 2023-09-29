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
        Schema::create('vans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->integer('idnumber');
            $table->string('orcr');
            $table->string('platenumber');
            $table->string('fullname');
            $table->string('companyname');
            $table->string('address');
            $table->string('model');
            $table->integer('bag');
            $table->integer('seat');
            $table->string('ac');
            $table->string('fuel');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vans');
    }
};
