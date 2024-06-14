<?php

namespace App\Http\Controllers;

use App\Imports\EtapeImport;
use App\Imports\ResultatImport;
use App\Models\Etape;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class EtapeController extends Controller
{
    public function etapes($course)
    {
        try {
            $etapes = Etape::getEtapes($course);
            return view ('Etape')->with('etapes', $etapes);
        }catch (\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }

    public function SaveEtapes(Request $request)
    {
        try {
            $request->validate([
                'nom' => 'required|max:255',
                'longueur' => 'required',
                'coureur' => 'required',
                'rang' => 'required',
                'course' => 'required|max:255',
                'debut' => 'required',
            ]);

            Etape::SaveEtapes(request('nom'), request('longueur'), request('coureur'), request('rang'), \request('course'), request('debut'));
            return redirect()->back();
        }catch (\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }

    public function importEtapeResultat(Request $request)
    {
        try {
            $etapes = $request->file('etapes');
            $resultat = $request->file('resultat');
            Excel::import(new EtapeImport(), $etapes);
            Excel::import(new ResultatImport(), $resultat);
            DB::statement('SELECT insert_data()');
//            DB::delete('delete from resultat');
            return redirect()->back();
        }catch (\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }

    public function DetailEtape($etape)
    {
        try {
            $details = DB::table('coureur_chrono_rang')
                ->where('etape_id', $etape)
                ->orderBy('rang', 'ASC')->get();
            return view('EtapeDetail')->with('details', $details);
        }catch (\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }

    //
}
