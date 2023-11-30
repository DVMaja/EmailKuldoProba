<?php


namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use mysqli;

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
        $students = DB::table('students as s')
            ->select('s.student_id', 's.email', 's.nev')
            ->get();
            Storage::put('studentEmailData.jpg', $students);
        return $students;
    }

    public function studentDatasKiiratas()
    {
        //$database = DB::table('students');
        //$results= $database->query('SELECT "student_id", "email", "nev"  FROM data;')->fetch_all();
        //$results= $database->query('SELECT *  FROM data');
        $result = DB::table('students as s')
            ->select('s.student_id', 's.email', 's.nev')
            ->get();
        /*  $data  = array();
        foreach ($result as $row) {
            $student_id = $row[0];
            $email = $row[1];
            $nev = $row[2];            
            $data[] = array($student_id, $email, $nev);
        } */
        //return $students;
        //$json = json_encode(array("data" => $data));
        // return response()->json($result);
        //return $ $results;

    }

    public function valami()
    {
        return json_encode(DB::table('students as s')
            ->select('s.student_id', 's.email', 's.nev')
            ->get()->toArray());
    }
}
