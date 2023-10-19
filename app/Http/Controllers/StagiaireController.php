<?php

namespace App\Http\Controllers;

use App\Models\Stagiaire;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class StagiaireController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }



    public function login(Request $request)
    {
        if (Auth::guard('stagiaire')->attempt($request->only('email', 'password'))) {

            if (!auth('stagiaire')->user()->status) {
                $user = Stagiaire::where('email', $request->only('email'))->first();
                $user->status = 1;
                $user->save();
            }
            return redirect()->route('upload_cv');
        } else
            return redirect()->route('login')->with('error', 'Connexion échouée. Vérifiez vos informations.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
