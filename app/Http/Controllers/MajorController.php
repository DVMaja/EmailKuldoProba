<?php

namespace App\Http\Controllers;

use App\Models\Major;
use Illuminate\Http\Request;

class MajorController extends Controller
{
    //
    public function index()
    {
        return Major::all();
    }

    public function show($id)
    {
        return Major::find($id);
    }

    public function destroy($id)
    {
        Major::find($id)->delete();
    }

    public function update(Request $request, $id)
    {
        $major = Major::find($id);
        $major->elnevezes = $request->elnevezes;
        $major->save();
    }

    public function store(Request $request)
    {
        $major = new Major();
        $major->elnevezes = $request->elnevezes;
        $major->save();
    }
}
