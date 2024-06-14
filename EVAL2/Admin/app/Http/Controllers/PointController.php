<?php

namespace App\Http\Controllers;

use App\Imports\PointImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class PointController extends Controller
{
    public function importPoints(Request $request)
    {
        try {
            $file = $request->file('points');
            Excel::import(new PointImport(),$file);
            return redirect()->back();
        }catch (\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }
}
