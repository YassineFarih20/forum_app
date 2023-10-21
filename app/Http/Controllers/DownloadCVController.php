<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DownloadCVController extends Controller
{
    public function __invoke()
    {
        $user = Auth::guard('stagiaire')->user();
        if ($user && $user->cv) {
            $filePath = $user->cv;
            return Storage::disk('resumes')->exists($filePath) ?  Storage::disk("local")->download($filePath) : redirect()->back()->with('error', 'CV file not found.');
        }
    }
}
