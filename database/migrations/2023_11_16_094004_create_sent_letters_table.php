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
        Schema::create('sent_letters', function (Blueprint $table) {
            //$table->id();
            $table->foreignId('adoszam')->references('adoszam')->on('students');
            $table->date('kuld_datum');
            $table->primary(['adoszam', 'kuld_datum']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sent_letters');
    }
};
