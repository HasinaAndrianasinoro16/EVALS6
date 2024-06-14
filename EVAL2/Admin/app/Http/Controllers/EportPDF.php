<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EportPDF extends Controller
{
    public function ExportPDF($equipe)
    {
        try {
            $sql = "SELECT coureur_nom FROM classement_equipe_coureur WHERE rang = 1 AND equipe_nom = '" . $equipe ."'";
            $results = DB::select($sql);
            return view('EportPDF')->with('results', $results);
        }catch (\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }
}
