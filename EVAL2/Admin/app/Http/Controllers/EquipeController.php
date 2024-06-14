<?php

namespace App\Http\Controllers;

use App\Models\Equipe;
use Illuminate\Http\Request;

class EquipeController extends Controller
{
    public function SaveEquipe(Request $request){
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8',
            ]);

            Equipe::SaveEquipe($validatedData['name'],$validatedData['email'],$validatedData['password']);
             return redirect()->back();
        }catch (\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }

    public function ListEquipes()
    {
        try {
            $equipes = Equipe::getEquipe();
            return view('ListEquipe')->with('equipes',$equipes);
        }catch (\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }
}
