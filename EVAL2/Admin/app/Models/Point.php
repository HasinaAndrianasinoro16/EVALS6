<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    protected $table = 'points';
    protected $primaryKey = 'id';
    protected $fillable = ['rang','valeur'];
    public $timestamps = false;
    use HasFactory;
}
