<?php

namespace App\Imports;

use App\Models\Stagiaire;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;

class StagiairesImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */

    public function model(array $row)
    {
        $stg = new Stagiaire();
        $stg->matricule = $row[0];
        $stg->CIN = $row[1];
        $stg->email = $row[2];
        $stg->nom = $row[3];
        $stg->prenom = $row[4];
        $stg->dateNaissance = $row[5];
        $stg->telephone = $row[6];
        $stg->filiere = $row[7];
        $stg->password = Hash::make($row[8]);
        $stg->key = $row[9];
        return $stg;
    }
}
