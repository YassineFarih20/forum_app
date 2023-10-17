<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\imports\StagiairesImport;

class StagiaireController extends Controller
{
    public function index()
    {
        return view('importCSV');
    }

    public function import(Request $request)
    {
        $file = $request->file('file');
        Excel::import(new StagiairesImport, $file);
        return back()->with('success', 'Stagiaires imported successfully.');
    }
    public function export()
    {
        return Excel::download(new StagiairesImport, 'stagiaires.xlsx');
    }
}
