<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Penalite extends Model
{
    protected $table = 'penalite';
    protected $primaryKey = 'id';
    protected $fillable=['id','equipe','etape','penalite'];
    public $timestamps = false;

    public static function SavePenalite($equipe, $etape, $penalites)
    {
        try {
            $penalite = new Penalite();
            $penalite->equipe = $equipe;
            $penalite->etape = $etape;
            $penalite->penalite = $penalites;
            $penalite->save();

            return $penalite;
        }catch (\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }

    public static function GetPenalite()
    {
        try {
            $liste = DB::table('vpenalite')->get();
            return $liste;
        }catch (\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }

    public static function DeletePenalite($id)
    {
        try {
            $drop = DB::table('penalite')
                ->where('id', $id)
                ->delete();
            return $drop;
        }catch (\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }

    use HasFactory;
}
