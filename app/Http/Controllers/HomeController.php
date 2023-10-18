<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        // Récupérez l'utilisateur authentifié (le stagiaire)
        return view('upload_cv');
    }
}
