<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


class Stagiaire extends Model implements Authenticatable
{
    use \Illuminate\Auth\Authenticatable;
    use HasFactory;

    protected $table = 'stagiaires';
    protected $primaryKey = 'id'; // Specify the custom ID field as the primary key
    public $incrementing = false; // Disable auto-incrementing for the custom ID
    protected $hidden = [
        'password',
    ];
    protected $casts = [
        'password' => 'hashed',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            // Generate a custom ID and set it before saving the model
            $model->id = 'STG-' . uniqid();
            // You can customize the ID generation logic
        });
    }
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
    public function generatePassword()
    {
        $number = (int) $this->matricule /  (int) substr($this->matricule, 4, 4);
        $roundedNumber = round($number);
        $lastSixDigits = substr($roundedNumber, -6);
        return $lastSixDigits;
    }
}
