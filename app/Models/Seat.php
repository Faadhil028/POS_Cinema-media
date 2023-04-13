<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    use HasFactory;

    protected $table = "seats";
    public $timestamps = false;

    protected $guarded = ["id"];

    public function timetable()
    {
        // return $this->belongsToMany(Timetable::class, 'timetable_has_seat', 'seat_id', 'timetable_id');
        return $this->belongsToMany(Timetable::class,'timetable_has_seat');
    }
}
