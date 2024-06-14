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
    public $timestamps = false;
    protected $fillable = ['id','nom','longueur','nombrecoureur','range','etat','course'];

    public static function getEtape($course)
    {
        try {
            $liste = Etape::where('course',$course)->get();
            return $liste;
        }catch (\Exception $exception){
            throw new \Exception( $exception->getMessage());
        }
    }

//    public static function getID()
//    {
//        try {
//            $seqvalue = DB::select("SELECT nextval('seqetape')");
//            if (!empty($seqvalue)) {
//                $seqvalue = $seqvalue[0]->nextval;
//            } else {
//                throw new QueryException("jereo tsara le anarana sequence na verifeo ko hoe misy sequence tokoa v, ao ligne 17 ny olana");
//            }
//
//            return "ETP00" . $seqvalue;
//        } catch (\Exception $e) {
//            throw new QueryException("misy diso: " . $e->getMessage());
//        }
//    }

    use HasFactory;
}
