<?php

namespace App\Http\Controllers;

use App\Models\Coureur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CoureurController extends Controller
{

    public function SaveCoureur(Request $request)
    {
        try
        {
        $request->validate([
            'nom' => 'required|max:255',
            'numeros' => 'required',
            'genre' => 'required',
            'dtn' => 'required|date',
        ]);

        Coureur::SaveCoureur(request('nom'), request('numeros'), request('genre'), request('dtn'));
        return redirect('/Coureur');
        }catch (\Exception $exception)
        {
            throw new \Exception( $exception->getMessage());
        }
    }

    public function AllCoureur()
    {
        try {
            $equipe = Auth::id();
            $coureurs = DB::table('vcoureur')
                ->where('idequipe','=',$equipe)
                ->paginate(10);
            return view('ListCoureur')->with('coureurs', $coureurs);
        }catch (\Exception $exception){
            throw new \Exception( $exception->getMessage());
        }
    }

    public function SaveEtapeCoureur(Request $request)
    {
        try {
            $request->validate([
                'coureur' => 'required',
                'etape' => 'required',
            ]);

            Coureur::SaveEtapeCoureur(request('etape'), request('coureur'));
            return redirect()->back();
        }catch (\Exception $exception){
            throw new \Exception( $exception->getMessage());
        }
    }

}
