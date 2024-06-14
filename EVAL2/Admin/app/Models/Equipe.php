<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Equipe extends Model
{
    public static function SaveEquipe($name, $email, $password)
    {
        try {
            $user = new User();
            $user->name = $name;
            $user->email = $email;
            $user->password = Hash::make($password);
            $user->save();

            return $user;
        }catch (\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }

    public static function getEquipe()
    {
        try {
            $liste = DB::table('users')
                ->where('usertype','=',1)
                ->paginate(10);
            return $liste;
        }catch (\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }
    use HasFactory;
}
