<?php

namespace App\Http\Controllers;

use App\Models\Penalite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenaliteController extends Controller
{
    public function Penalite(){
        try {
            $etapes = DB::table('etape')->get();
            $equipes = DB::table('users')->where('usertype',1)->get();
            $penalites = Penalite::GetPenalite();
            return view('Penalite')->with('etapes',$etapes)->with('equipes',$equipes)->with('penalites',$penalites);
        }catch (\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }

    public  function SavePenalite(Request $request)
    {
        try {
            $request->validate([
                'etape' => 'required',
                'equipe' => 'required',
                'penalite' => 'required',
            ]);
            Penalite::SavePenalite(\request('equipe'),\request('etape'),\request('penalite'));
            return redirect()->back();
        }catch (\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }

    public function DeletePenalite($id)
    {
        try {
            Penalite::DeletePenalite($id);
            return redirect()->back();
        }catch (\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }
    //
}
