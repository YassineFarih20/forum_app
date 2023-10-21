<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Stagiaire extends Model implements Authenticatable
{
    use \Illuminate\Auth\Authenticatable;
    use HasFactory;

    public function getCV()
    {
        if ($this->cv) {

            // Get the PDF file from the local disk
            $pdf = Storage::disk('resumes')->get($this->cv);

            // Serve the PDF file as a response
            return response($pdf, 200, [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; filename="' . $this->cv . '"',
            ]);
        }
        return false;
    }
}
