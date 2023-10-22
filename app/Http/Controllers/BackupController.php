<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\imports\StagiairesImport;
use App\Exports\StagiairesExport;
use App\imports\EntreprisesImport;
use App\Exports\EntreprisesExport;


class BackupController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:1');
    }
    public function index()
    {
        return view('admin.backup');
    }

    public function importStagiaires(Request $request)
    {
        $file = $request->file('file');
        Excel::import(new StagiairesImport, $file);
        return back()->with('success', 'Stagiaires imported successfully.');
    }

    public function exportStagiaires()
    {
        return Excel::download(new StagiairesExport, 'stagiaires.csv');
    }

    public function importEntreprises(Request $request)
    {
        $file = $request->file('file');
        Excel::import(new EntreprisesImport, $file);
        return back()->with('success', 'Entreprises imported successfully.');
    }

    public function exportEntreprises()
    {
        return Excel::download(new EntreprisesExport, 'entreprises.csv');
    }
}
