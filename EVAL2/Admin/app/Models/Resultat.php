<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resultat extends Model
{
    protected $table = 'resultat';
    protected $fillable = ['etape_rang','numero_dossar','nom','genre','date_naissance','equipe','arriver'];
    public $timestamps = false;
    use HasFactory;
}
