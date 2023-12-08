<?php

use App\Http\Controllers\Pdf_pathController;
use App\Http\Controllers\StudentController;
use App\Mail\TesztEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/testroute', function () {
    tobbszoriKuldes();
});

Route::get('/api/student_datas', [StudentController::class, 'studentDatas']); //lekérdezi az emailküldéshez kellő adatokat

//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! FIGYELEM FELÜLÍRJA az előzőt
Route::get('/api/student_datas_jsonba', [StudentController::class, 'studentDatasJsonba']); //json file létrehozása
//a lefuttatjuk FELÜLÍRJA az előző létezett json file-t
//Route::get('/api/pdf_path_jsonba', [Pdf_pathController::class, 'pdfPathJsonba']);

function tobbszoriKuldes()
{    
    $jsonFilePath = storage_path('app/jsonTarolo/studentEmailData_2023-12-08_08-46.json');   

    
    if (file_exists($jsonFilePath)) {
        $jsonContent = file_get_contents($jsonFilePath);
        $students = json_decode($jsonContent);

        foreach ($students as $student) {
            $details = [
                'name' => $student->nev,
                'email' => $student->email,
                'student_id' => $student->student_id,
                'path' => $student->path, 

            ];
            //print($details['path']);
            Mail::to($student->email)->send(new TesztEmail($details)); //, $pdfAdatok
        }
        //}

        dd("Emails elküldve");
    } else {
        dd("JSON file not found");
    }
}



//toth.laszlo@akkszalezi.hu
    //athena.noctua.1769@gmail.com