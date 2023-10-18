<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stagiaire;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $stagiaire = Stagiaire::where('email', $credentials['email'])->first();

        if ($stagiaire && Hash::check($credentials['password'], $stagiaire->password)) {
            // Vérifier que le mot de passe est correct
            if ($stagiaire->status === 0) {
                $stagiaire->status = 1; // Mettre à jour le statut à 1
                $stagiaire->save();
            }

            return redirect()->route('upload_cv');
        } else {
            return redirect()->route('login')->with('error', 'Connexion échouée. Vérifiez vos informations.');
        }
    }

    // public function logout()
    // {
    //     Auth::logout(); // Déconnectez le stagiaire
    //     return redirect()->route('login');
    // }
}
