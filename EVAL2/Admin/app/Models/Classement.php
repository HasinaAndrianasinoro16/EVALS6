<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Classement extends Model
{


    public static function ClassementByEtape($etape)
    {
        $results = DB::table('classement_points_etape_coureur')
            ->select('equipe', 'equipe_nom', DB::raw('SUM(points) AS score'),DB::raw('DENSE_RANK() OVER (ORDER BY SUM(points) DESC) AS rang'))
            ->where('etape', $etape)
            ->groupBy('equipe', 'equipe_nom')
            ->orderByDesc('score')
            ->get();

        return $results;
    }

    public static function ClassementByGenre($genre){
        $results = DB::table('classement_points_genre_etape_coureur')
            ->select('equipe_id','equipe_nom', DB::raw('SUM(points) as score'),DB::raw('DENSE_RANK() OVER (ORDER BY SUM(points) DESC) AS rang'))
            ->where('genre',$genre)
            ->groupBy('equipe_id','equipe_nom')
            ->orderByDesc('score')
            ->get();

        return $results;
    }

    public static function ClassementGeneral()
    {
        try {
            $results = DB::table('classement_points_etape_coureur')
                ->select(
                    'equipe_id',
                    'equipe_nom',
                    DB::raw('SUM(points) AS score'),
                    DB::raw('DENSE_RANK() OVER (ORDER BY SUM(points) DESC) AS rang')
                )
                ->groupBy('equipe_id','equipe_nom')
                ->orderByDesc('score')
                ->get();
            return $results;
        }catch (\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }

    public static function ClassementCategorie($categorie)
    {
        try {
            $results = DB::table('classement_points_categorie_etape_coureur')
                ->select('equipe_id','equipe_nom',DB::raw('SUM(points) as score'),DB::raw('DENSE_RANK() OVER (ORDER BY SUM(points) DESC) AS rang'))
                ->where('categorie',$categorie)
                ->groupBy('equipe_id','equipe_nom')
                ->orderByDesc('score')
                ->get();
            return $results;
        }catch (\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }

    public static function DetailPointEquipe($equipe)
    {
        try {
            $sql = "SELECT (SELECT nom FROM etape WHERE id = cpe.etape) AS etape_nom, SUM(points) AS points
                FROM classement_points_etape_coureur AS cpe
                WHERE equipe_nom = :equipe
                GROUP BY etape";

            $results = DB::select($sql, ['equipe' => $equipe]);

            return $results;
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }



    use HasFactory;
}
