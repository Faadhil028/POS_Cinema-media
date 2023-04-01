<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Film extends Model
{
    use HasFactory;

    //bypass mass assignment rule
    protected $guarded = [];

    protected $dates = ['start_date','end_date'];

    protected $primaryKey = 'id';

    //ignore timestamps
    public $timestamps = false;

    public function genres(){
        return $this->belongsToMany(Genre::class,'films_has_genres','films_id','genres_id');
    }
}
