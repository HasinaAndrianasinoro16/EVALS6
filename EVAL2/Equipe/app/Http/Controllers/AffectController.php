<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AffectController extends Controller
{
    public function affect($coureur = null, $etape = null) {
        try {
            if (is_null($etape)) {
                throw new \Exception('Étape non spécifiée.');
            }

            $coureurs = DB::table('vcoureur')
                ->where('idequipe', Auth::id())
                ->get();

            $count = DB::table('etapecoureur')
                ->join('coureur', 'etapecoureur.coureur', '=', 'coureur.id')
                ->where('coureur.equipe', Auth::id())
                ->where('etapecoureur.etape', $etape)
                ->count();

            $chronos = DB::table('chrono_coureur')
                ->where('equipe',Auth::id())
                ->where('etape', $etape)
                ->get();

            return view('affect')->with('coureurs', $coureurs)->with('count', $count)->with('chronos', $chronos)->with('etape', $etape);
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors($exception->getMessage());
        }
    }
//    public function affect($etape){
//        try {
//            $coureurs = DB::table('vcoureur')
//                ->where('idequipe','=',Auth::id())
//                ->get();
//
//            $count = DB::table('etapecoureur')
//                ->join('coureur', 'etapecoureur.coureur', '=', 'coureur.id')
//                ->where('coureur.equipe', Auth::id())
//                ->where('etapecoureur.etape', $etape)
//                ->count();
//            return view('affect')->with('coureurs',$coureurs)->with('count',$count);
//        }catch (\Exception $exception){
//            throw new \Exception($exception->getMessage());
//        }
//    }
}
