<?php

namespace App\Http\Controllers;

use App\Models\Sent_letter;
use Illuminate\Http\Request;

class Sent_letterController extends Controller
{
    //
    public function index()
    {
        return Sent_letter::all();
    }

    public function show($id)
    {
        return Sent_letter::find($id);
    }

    public function destroy($id)
    {
        Sent_letter::find($id)->delete();
    }

    public function update(Request $request, $id)
    {
        $sent_letter = Sent_letter::find($id);
        $sent_letter->kuld_datum = $request->kuld_datum;
        $sent_letter->student_id = $request->student_id;        
        $sent_letter->save();
    }

    public function store(Request $request)
    {
        $sent_letter = new Sent_letter();
        $sent_letter->kuld_datum = $request->kuld_datum;
        $sent_letter->student_id = $request->student_id;  
        $sent_letter->save();
    }
}
