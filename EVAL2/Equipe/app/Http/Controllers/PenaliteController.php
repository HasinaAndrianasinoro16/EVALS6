<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PenaliteController extends Controller
{
    public function Penalite()
    {
        try {
            $penalites = DB::table('vpenalite')
                ->where('equipe',Auth::user()->name)
                ->get();
            return view('Penalite')->with('penalites', $penalites);
        }catch (\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }
}
