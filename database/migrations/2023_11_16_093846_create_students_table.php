<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            //$table->id("student_id");
            $table->integer('student_id');
            $table->integer('adoszam');
            $table->integer('tajszam');
            $table->string('email')->unique();
            $table->string('nev');
            $table->string('szul_nev');
            $table->string('anyja_neve');
            $table->integer('okt_azon');
            $table->foreignId('major_id')->references('major_id')->on('majors');
            $table->primary(['student_id']);
            $table->timestamps();
        });
        
        DB::table('majors')->insert([
            ['adoszam'=> 1234567, 'tajszam'=> 1234512345, 'email'=> 'athena.noctua.1769@gmail.com', 'nev'=>'Proba Felhasználó', 'major_id'=> 1],
            ['adoszam'=> 4534567, 'tajszam'=> 1454512345, 'email'=> 'majadreilinger@gmail.com', 'nev'=>'Proba 2 ', 'major_id'=> 2],            
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
