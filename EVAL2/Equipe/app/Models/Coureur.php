<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class Coureur extends Model
{
    protected $table = 'coureur';
    protected $primaryKey = 'id';
    protected $keyType ='string';
    public $timestamps = false;
    protected $fillable = ['id','nom','numeros','genre','dtn','equipe'];

    public static function getId()
    {
        try {
            $seqvalue = DB::select("SELECT nextval('seqcoureur')");
               if (!empty($seqvalue)) {
                $seqvalue = $seqvalue[0]->nextval;
            } else {
                throw new QueryException("jereo tsara le anarana sequence na verifeo ko hoe misy sequence tokoa v, ao ligne 17 ny olana");
            }

            return "COUR00" . $seqvalue;
        }catch (\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }

    public static function SaveCoureur($nom, $numeros, $genre, $dtn)
    {
        try {
            $coureur = new Coureur();
            $coureur->id = self::getId();
            $coureur->nom = $nom;
            $coureur->numeros = $numeros;
            $coureur->genre = $genre;
            $coureur->dtn = $dtn;
            $coureur->equipe = Auth::id();
            $coureur->save();

            return $coureur;
        }catch (\Exception $exception){
            throw new \Exception($exception->getMessage());
        }
    }

    public static function SaveEtapeCoureur($etape,$coureur)
    {
        try {
            $etape = DB::table('etapecoureur')
                ->insert([
                    'etape' => $etape,
                    'coureur' => $coureur,
                ]);
            return $etape;
        }catch (\Exception $exception){
            throw new \Exception($exception->getMessage());
        }
    }

    use HasFactory;
}
