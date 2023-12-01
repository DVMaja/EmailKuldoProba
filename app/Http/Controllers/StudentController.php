<?php


namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    //
    public function index()
    {
        return Student::all();
    }

    public function show($id)
    {
        return Student::find($id);
    }

    public function destroy($id)
    {
        Student::find($id)->delete();
    }

    public function update(Request $request, $id)
    {
        $student = Student::find($id);
        $student->adoszam = $request->adoszam;
        $student->tajszam = $request->tajszam;
        $student->email = $request->email;
        $student->nev = $request->nev;
        $student->szul_nev = $request->szul_nev;
        $student->anyja_neve = $request->anyja_neve;
        $student->okt_azon = $request->okt_azon;
        $student->major_id = $request->major_id;
        $student->save();
    }

    public function store(Request $request)
    {
        $student = new Student();
        $student->adoszam = $request->adoszam;
        $student->tajszam = $request->tajszam;
        $student->email = $request->email;
        $student->nev = $request->nev;
        $student->szul_nev = $request->szul_nev;
        $student->anyja_neve = $request->anyja_neve;
        $student->okt_azon = $request->okt_azon;
        $student->major_id = $request->major_id;
        $student->save();
    }

    public function studentDatas()
    {
        return DB::table('students as s')
            ->select('s.student_id', 's.email', 's.nev')
            ->get();
    }

    public function studentDatasJsonba()
    {
        $students = DB::table('students as s')
            ->select('s.student_id', 's.email', 's.nev')
            ->get();

        $timestamp = now()->format('Y-m-d_H-i');
        $jsonFileName = 'studentEmailData_' . $timestamp . '.json';

        $jsonContent = json_encode($students);
        Storage::put('/jsonTarolo/' . $jsonFileName, $jsonContent);

        return $students;
    }
}
