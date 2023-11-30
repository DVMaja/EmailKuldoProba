<?php

use App\Models\Student;
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
            $table->string('student_id');
            $table->integer('adoszam');
            $table->integer('tajszam')->nullable()->default(null);
            $table->string('email');//->unique() amíg tesztelés van
            $table->string('nev');
            $table->string('szul_nev')->nullable()->default(null);
            $table->string('anyja_neve')->nullable()->default(null);
            $table->integer('okt_azon')->nullable()->default(null);
            $table->foreignId('major_id')->references('major_id')->on('majors');
            $table->primary(['student_id', 'adoszam']);
            $table->timestamps();
        });

        /* DB::table('majors')->insert([
            [],
            ['student_id' => 00525, 'email' => 'majadreilinger@gmail.com', 'nev' => 'Proba 2', 'major_id' => 2],
        ]); */

        Student::create([
            'student_id' => '00524',
            'adoszam'=> 1234567,
            'email' => 'athena.noctua.1769@gmail.com',
            'nev' => 'Proba Felhasználó',
            'major_id' => 1
        ]);

        Student::create([
            'student_id' => '00525',
            'adoszam'=> 1564567,
            'email' => 'majadreilinger@gmail.com',
            'nev' => 'Proba 2',
            'major_id' => 2
        ]);

        Student::create([
            'student_id' => '00526',
            'adoszam'=> 8344567,
            'email' => 'majadreilinger@gmail.com',
            'nev' => 'Proba Masik',
            'major_id' => 2
        ]);

        Student::create([
            'student_id' => '00527',
            'adoszam'=> 7345891,
            'email' => 'athena.noctua.1769@gmail.com',
            'nev' => 'Proba Kuldés4',
            'major_id' => 1
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
