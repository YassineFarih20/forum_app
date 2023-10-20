<?php

namespace App\Http\Controllers;

use App\Models\Stagiaire;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class StagiaireController extends Controller
{
    public function loginIndex()
    {
        return view('auth.login');
    }
    public function invitation()
    {
        return view('invitation');
        // return 'invitation';
    }
    public function cvIndex()
    {
        return view('uploadCv');
    }
    public function cvUpload()
    {
        return redirect()->route('profile.invitation');
    }
    public function profile()
    {
        return view('profile');
    }



    public function login(Request $request)
    {
        if (Auth::guard('stagiaire')->attempt($request->only('email', 'password'))) {

            if (!auth('stagiaire')->user()->status) {
                $user = Stagiaire::where('email', $request->only('email'))->first();
                $user->status = 1;
                $user->save();
            }
            return redirect()->route('profile.cvIndex');
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
