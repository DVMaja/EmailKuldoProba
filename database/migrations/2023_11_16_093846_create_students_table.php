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
        Schema::create('students', function (Blueprint $table) {
            $table->id("adoszam");
            $table->integer('tajszam');
            $table->string('nev');
            $table->string('szul_nev');
            $table->string('anyja_neve');
            $table->integer('okt_azon');
            $table->foreignId('major_id')->references('major_id')->on('majors');
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
