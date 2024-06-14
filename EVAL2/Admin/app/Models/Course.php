<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Course extends Model
{
    protected $table = 'course';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    protected $fillable = ['id','nom'];
    public $timestamps = false;

    public static function getId()
    {
        try {
            $seqvalue = DB::select("SELECT nextval('seqcourse')");
            if (!empty($seqvalue)) {
                $seqvalue = $seqvalue[0]->nextval;
            } else {
                throw new QueryException("jereo tsara le anarana sequence na verifeo ko hoe misy sequence tokoa v, ao ligne 17 ny olana");
            }
            return "COURS00" . $seqvalue;
        }catch (\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }

    public static function SaveCourse($nom)
    {
        try {
            $course = new Course();
            $course->id = self::getId();
            $course->nom = $nom;
            $course ->save();

            return $course;
        }catch (\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }

//    public static function getCourses()
//    {
//        try {
//            $liste = Course::all();
//            return $liste;
//        }catch (\Exception $e){
//            throw new \Exception($e->getMessage());
//        }
//    }
    use HasFactory;
}
