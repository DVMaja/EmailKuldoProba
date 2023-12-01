<?php

use App\Models\Pdf_path;
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
        Schema::create('pdf_paths', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('student_id')->references('student_id')->on('students');
            $table->string('path');
            //$table->primary(['year', 'month', 'path']);
            $table->year('year');
            $table->string('month', 2);
            $table->timestamps();
        });

        Pdf_path::create([
            //'student_id' => '00524',
            'path' => '202301',
            'year' => 2023,
            'month' => '01',
        ]);

        Pdf_path::create([
            //'student_id' => '00524',
            'path' => '202301',
            'year' => 2023,
            'month' => '01',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pdf_paths');
    }
};
