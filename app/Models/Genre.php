<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $timestamps = false;

    public function films(){
        return $this->belongsToMany(Film::class,'films_has_genres','genres_id','films_id');
    }
}
