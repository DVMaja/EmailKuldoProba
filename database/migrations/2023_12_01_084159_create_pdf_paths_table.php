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
    public function up(): void //paraméterként kell átadnia file nevét(a kódot->student_id)?//kell a file tényleges neve

    {
        Schema::create('pdf_paths', function (Blueprint $table) {
            //laravel diamikus feltöltése laravelben Kérdezd Tanárnőt
            $table->id();
            $table->string('student_id'); //dinamikus kitöltés
            //csak a file neve
            //dinamikusan kitölteni?
            //$table->string('pdf_name');
            $table->string('path');
            $table->year('year');
            $table->string('month', 2);
            $table->timestamps();
            $table->foreign('student_id')->references('student_id')->on('students');
        });

        Pdf_path::create([
            'student_id' => '00524', //ide meghívni a függvényt?
            'path' => '202301',
            'year' => 2023,
            'month' => '01',
        ]);

        Pdf_path::create([
            'student_id' => '00525',
            'path' => '202301',
            'year' => 2023,
            'month' => '02',
        ]);

        Pdf_path::create([
            'student_id' => '00526',
            'path' => '202301',
            'year' => 2023,
            'month' => '02',
        ]);

        Pdf_path::create([
            'student_id' => '00527',
            'path' => '202301',
            'year' => 2023,
            'month' => '02',
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
