<?php

namespace App\Http\Controllers;

use App\Models\Pdf_path;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Pdf_pathController extends Controller
{
    public function index()
    {
        return Pdf_path::all();
    }

    public function show($id)
    {
        return Pdf_path::find($id);
    }

    public function destroy($id)
    {
        Pdf_path::find($id)->delete();
    }

    public function update(Request $request, $id)
    {
        $pdf_path = Pdf_path::find($id);
        $pdf_path->path = $request->path;
        $pdf_path->year = $request->year;
        $pdf_path->month = $request->month;
        $pdf_path->save();
    }

    public function store(Request $request)
    {
        $pdf_path = new Pdf_path();
        $pdf_path->path = $request->path;
        $pdf_path->year = $request->year;
        $pdf_path->month = $request->month;
        $pdf_path->save();
    }
    public function pdfPathJsonba()
    {
        $pdf_path = DB::table('pdf_paths as p')
            ->select('p.path', 'p.year', 'p.month')
            ->get();
        $jsonFileName = 'pdf_pathData.json';

        $jsonContent = json_encode($pdf_path);
        Storage::put('/pathTarolo/' . $jsonFileName, $jsonContent);

        return $pdf_path;
    }
}
