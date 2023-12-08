<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PdfPathController extends Controller
{
    public function index(Request $request)
    {
        $directory = "pdfek/202301";
        $files = Storage::allFiles($directory);

        dd($files);
    }
}
