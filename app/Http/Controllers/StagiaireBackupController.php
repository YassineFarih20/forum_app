<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\imports\StagiairesImport;
use App\Exports\StagiairesExport;


class StagiaireBackupController extends Controller
{
    public function index()
    {
        return view('admin.backup');
    }

    public function import(Request $request)
    {
        $file = $request->file('file');
        Excel::import(new StagiairesImport, $file);
        return back()->with('success', 'Stagiaires imported successfully.');
    }

    public function export()
    {
        return Excel::download(new StagiairesExport, 'stagiaires.csv');
    }
}
