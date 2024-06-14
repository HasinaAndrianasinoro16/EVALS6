<?php

namespace App\Imports;

use App\Models\Etape;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EtapeImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        try {
            $time = $row['date_depart']. ' '. $row['heure_depart'];
            $datetime = Carbon::createFromFormat('d/m/Y H:i:s', $time);

            if ($datetime === false) {
                throw new \InvalidArgumentException("Erreur de format de date/heure");
            }

            return new Etape([
                'id' => Etape::getId(),
                'nom' => $row['etape'],
                'longueur' => str_replace(',', '.', $row['longueur']),
                'nombrecoureur' => $row['nb_coureur'],
                'rang' => $row['rang'],
                'etat' => 1,
                'course' => 'COURS001',
                'debut' => $datetime,
            ]);
        } catch (\Exception $e) {
            // Loguer l'erreur ou la traiter comme vous le souhaitez
//            Log::error("Erreur lors de l'importation des étapes: ". $e->getMessage());
            return null; // Retourne null ou gère l'erreur comme vous le souhaitez
        }
    }

//    public function model(array $row)
//    {
//        $id = Etape::getId();
//
//        $time = $row['date_depart']. ' '. $row['heure_depart'];
//        $datetime = Carbon::createFromFormat('Y-m-d H:i:s', $time);
//        return new Etape([
//            'id' => $id,
//            'nom' => $row['etape'],
//            'longueur' => str_replace(',', '.', $row['longueur']),
//            'nombrecoureur' => $row['nb_coureur'],
//            'rang' => $row['rang'],
//            'etat' => 1,
//            'course' => 'COURSE001',
//            'debut' => $datetime,
//        ]);
//    }
}
