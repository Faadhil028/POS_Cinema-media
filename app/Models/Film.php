<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    //bypass mass assignment rule
    protected $guarded = [];

    protected $primaryKey = 'id';

    //Make an Alias of a column
    // public function getDurationAttribute($value){
    //     return $this->attributes['duration(m)'];
    // }

    //ignore timestamps
    public $timestamps = false;

    public function genres(){
        return $this->belongsToMany(Genre::class,'films_has_genres','films_id','genres_id');
    }
}
