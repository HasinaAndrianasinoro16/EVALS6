<?php

namespace App\Http\Controllers;

use App\Models\Classement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClassementController extends Controller
{
    public function classement()
    {
        try {
            $etapes = DB::table('etape')->get();
            $categories = DB::table('categorie')->get();
            return view ('Classement')->with('etapes', $etapes)->with('categories', $categories);
        }catch (\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }

    public function ClassementGeneral()
    {
        try {
            $classes = Classement::ClassementGeneral();
            return view('ListClassement')->with('classes', $classes);
        }catch (\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }

    public function ClassementGenre(Request $request)
    {
        try {
            $request->validate([
                'genre' => 'required',
            ]);
            $classes = Classement::ClassementByGenre(request('genre'));
            return view('ListClassement')->with('classes', $classes);
        }catch (\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }

    public function ListClassement(Request $request)
//    public function ListClassement()
    {
        try {
            $request->validate([
                'etape' => 'required',
            ]);
            $classes = Classement::ClassementByEtape(\request('etape'));
            return view('ListClassement')->with('classes', $classes);
        }catch (\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }

    public function ClassementCategorie(Request $request)
    {
        try {
            $request->validate([
                'categorie' => 'required',
            ]);
            $classes = Classement::ClassementCategorie(\request('categorie'));
            return view('ListClassement')->with('classes', $classes);
        }catch (\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }

    public  function DetailPointEquipe($equipe)
    {
        try {
            $details = Classement::DetailPointEquipe($equipe);
            return view('DetailPointEquipe')->with('details', $details);
        }catch (\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }


}
