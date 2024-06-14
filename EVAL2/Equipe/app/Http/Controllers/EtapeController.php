<?php

namespace App\Http\Controllers;

use App\Models\Etape;
use Illuminate\Http\Request;

class EtapeController extends Controller
{
    public function getEtape ($course)
    {
        try {
            $etapes = Etape::getEtape($course);
            return view('Home')->with('etapes', $etapes);
        }catch (\Exception $exception){
            throw new \Exception($exception->getMessage());
        }
    }
}
