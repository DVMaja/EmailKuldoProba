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
            $table->foreignId('student_id')->references('student_id')->on('students');
            $table->date('kuld_datum');
            $table->primary(['student_id', 'kuld_datum']);
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
