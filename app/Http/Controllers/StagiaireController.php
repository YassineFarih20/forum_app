<?php

namespace App\Http\Controllers;

use App\Models\Stagiaire;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StagiaireController extends Controller
{

    public function __construct()
    {
        $this->middleware("auth:stagiaire")->except('loginIndex');
        $this->middleware("validateCv")->only('cvUpload');
        $this->middleware("validateLogin")->only('login');
    }
    public function loginIndex()
    {
        return view('auth.login');
    }
    public function invitation()
    {
        return view('invitation');
    }
    public function profile()
    {
        return view('profile');
    }
    public function cvIndex()
    {
        return view('uploadCv');
    }
    public function cvUpload(Request $request)
    {
        if ($request->hasFile('cv')) {
            $file = $request->file('cv');
            $user = Stagiaire::where('email', auth('stagiaire')->user()->email)->first();
            if ($user->cv) {
                $path = Storage::disk('resumes')->delete($user->cv);
            }
            $path = Storage::disk('resumes')->putFileAs('/', $file, str()->uuid() . '.' . $file->extension());
            $user->cv = $path;
            $user->save();

            return redirect()->route('profile.invitation');
        } else return redirect()->back()->withErrors(['error' => 'ERRRRRRRRRRRRRRRRRRRRRR']);
    }
    public function login(Request $request)
    {
        if (auth('stagiaire')->attempt($request->only('email', 'password'))) {
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
        Auth::guard('stagiaire')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
