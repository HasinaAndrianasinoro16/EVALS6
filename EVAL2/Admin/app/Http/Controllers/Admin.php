<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Admin extends Controller
{
    public function deleteAll()
    {
        try {
            DB::delete('delete from penalite');
            DB::delete('delete from categoriecoureur');
            DB::delete('delete from etapecoureur');
            DB::delete('delete from chrono');
            DB::delete('delete from etape');
            DB::delete('delete from coureur');
            DB::delete('delete from points');
            DB::delete('delete from resultat');
            return redirect('Home');
        }catch (\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }
    //
}
