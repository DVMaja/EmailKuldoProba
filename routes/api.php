<?php

use App\Mail\TesztEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/* Route::get('/testroute', function () {
    $name = "Teszt Email";
    $email = 'toth.laszlo@akkszalezi.hu';

    //the email sending is done using the to methode on the Mail facade
    //toth.laszlo@akkszalezi.hu
    //athena.noctua.1769@gmail.com
    Mail::to(users:$email)->send(new TesztEmail($name));
}); */