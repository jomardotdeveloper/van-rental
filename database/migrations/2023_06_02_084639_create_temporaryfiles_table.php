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
        Schema::create('temporaryfiles', function (Blueprint $table) {
            // $table->id();
            // $table->bigIncrements('uuid')->unsigned()->index();
            $table->uuid('uuid')->primary(); // Use uuid() method for UUID column
            $table->string('folder');
            $table->string('file');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('temporaryfiles');
    }
};
