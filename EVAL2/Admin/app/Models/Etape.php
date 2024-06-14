<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Etape extends Model
{
    protected $table = 'etape';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    protected $fillable = ['id','nom','longueur','nombrecoureur','rang','etat','course','debut'];
    public $timestamps = false;

    public static function getId()
    {
        try {
            $seqvalue = DB::select("SELECT nextval('seqetape')");
            if (!empty($seqvalue)) {
                $seqvalue = $seqvalue[0]->nextval;
            } else {
                throw new QueryException("jereo tsara le anarana sequence na verifeo ko hoe misy sequence tokoa v, ao ligne 17 ny olana");
            }
            return "ETP00" . $seqvalue;
        }catch (\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }

    public static function SaveEtapes($nom, $longeuur, $nombrecoureur, $rang, $course, $debut)
    {
        try {
            $etape = new Etape();
            $etape->id = self::getId();
            $etape->nom = $nom;
            $etape->longueur = $longeuur;
            $etape->nombrecoureur = $nombrecoureur;
            $etape->rang = $rang;
            $etape->etat = 1;
            $etape->course = $course;
            $etape->debut = $debut;

            $etape->save();
            return $etape;
        }catch (\Exception $exception){
            throw new \Exception($exception->getMessage());
        }
    }

    public static function getEtapes($course)
    {
        try {
            $etapes = DB::table('etape')
                ->where('course','=',$course)
                ->orderBy('rang', 'ASC')
                ->paginate(10);

            return $etapes;
        }catch (\Exception $exception){
            throw new \Exception($exception->getMessage());
        }
    }

    use HasFactory;
}
