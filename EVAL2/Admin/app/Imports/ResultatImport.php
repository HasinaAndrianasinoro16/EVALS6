<?php

namespace App\Imports;

use App\Models\Resultat;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ResultatImport implements ToModel, withHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $requiredKeys = ['etape_rang', 'numero_dossard', 'nom', 'genre', 'date_naissance', 'equipe', 'arriver'];
        foreach ($requiredKeys as $key) {
            if (!array_key_exists($key, $row)) {
                throw new \Exception("La clé '$key' est manquante dans la ligne du CSV.");
            }
        }

        $dateNaissance = Carbon::createFromFormat('d/m/Y', $row['date_naissance'])->format('Y-m-d');
        $arrivee = Carbon::createFromFormat('d/m/Y H:i:s', $row['arriver'])->format('Y-m-d H:i:s');

        return new Resultat([
            'etape_rang' => $row['etape_rang'],
            'numero_dossar' => $row['numero_dossard'],
            'nom' => $row['nom'],
            'genre' => $row['genre'],
            'date_naissance' => $dateNaissance,
            'equipe' => $row['equipe'],
            'arriver' => $arrivee,
        ]);
    }
}
