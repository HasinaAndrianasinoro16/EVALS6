<?php

namespace App\Models;

use Carbon\Carbon;
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

    public static function SaveCoureur($nom, $equipe,$numeros, $genre, $dtn)
    {
        try {
            $id = self::getId();
            $coureur = new Coureur();
            $coureur->id = $id;
            $coureur->nom = $nom;
            $coureur->numeros = $numeros;
            $coureur->genre = $genre;
            $coureur->dtn = $dtn;
            $coureur->equipe = $equipe;
            $coureur->save();

            self::GenerateCategorie($id);

            return $coureur;
        }catch (\Exception $exception){
            throw new \Exception($exception->getMessage());
        }
    }
    public static function GenerateCategorie($coureur)
    {
        try {
            $cour = DB::table('coureur')->where('id', $coureur)->value('dtn');

            $dtn = Carbon::parse($cour);
            $today = Carbon::today();
            $age = $dtn->diffInYears($today);

            $categorie = ($age < 18) ? 'CTG001' : 'CTG002';

            DB::table('categoriecoureur')->insert([
                'coureur' => $coureur,
                'categorie' => $categorie,
            ]);

            return response()->json(['message' => 'Catégorie générée avec succès', 'categorie' => $categorie], 201);

        } catch (Exception $exception) {
            return response()->json(['error' => $exception->getMessage()], 400);
        }
    }
//    public static function GenerateCategorie($coureur)
//    {
//        try {
//            $cour = DB::table('coureur')->where('id', $coureur)->get('dtn');
//            $dtn = Carbon::parse($cour);
//            $today = Carbon::today()->format('Y-m-d');
//            $age = $dtn->diffInYears($today);
//            if ($age < 18){
//                $categorie = DB::table('categoriecoureur')
//                    ->insert([
//                        'coureur' => $coureur,
//                        'categorie' => 'CTG001',
//                    ]);
//                return $categorie;
//            }
//            $categorie = DB::table('categoriecoureur')
//                ->insert([
//                    'coureur' => $coureur,
//                    'categorie' => 'CTG002',
//                ]);
//            return $categorie;
//
//        }catch (\Exception $exception){
//            throw new \Exception($exception->getMessage());
//        }
//    }
    use HasFactory;
}
