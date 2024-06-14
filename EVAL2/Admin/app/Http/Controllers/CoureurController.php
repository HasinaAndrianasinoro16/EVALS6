<?php

namespace App\Http\Controllers;

use App\Models\Coureur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CoureurController extends Controller
{
    public function Coureur($equipe)
    {
        try {
            $coureurs = DB::table('vcoureur')->where('idequipe','=', $equipe)->paginate(10);
            return view('Coureur')->with('coureurs', $coureurs);
        }catch (\Exception $exception){
            throw new \Exception($exception->getMessage());
        }
    }

    public function SaveCoureur(Request $request)
    {
        try {
            $request->validate([
                'nom' => 'required|max:255',
                'equipe' => 'required|max:255',
                'numeros' => 'required',
                'genre' => 'required',
                'dtn' => 'required|date',
            ]);
            Coureur::SaveCoureur(\request('nom'),request('equipe'),request('numeros'),request('genre'),request('dtn'));

            return redirect()->back();
        }catch (\Exception $exception){
            throw new \Exception($exception->getMessage());
        }
    }
}
