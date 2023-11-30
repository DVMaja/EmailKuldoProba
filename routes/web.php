<?php

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

function tobbszoriKuldes()
{
    $dbSzam = 1;

    //$email = 'toth.laszlo@akkszalezi.hu';
    $email = 'athena.noctua.1769@gmail.com';

    for ($i = 0; $i < 3; $i++) {
        $dbSzam++;
        $name = $dbSzam;
        $details = [
            'title' => $name,
            'name' => 'Címzett',
            'body' => 'generált üzenet',

        ];

        Mail::to(users: $email)->send(new TesztEmail($details));
    }
    dd("Email elküldve");
    //toth.laszlo@akkszalezi.hu
    //athena.noctua.1769@gmail.com
}
