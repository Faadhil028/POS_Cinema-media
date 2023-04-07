<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timetable extends Model
{
    use HasFactory;

    protected $table = 'timetables';

    public function seat()
    {
        return $this->belongsToMany(Seat::class, 'timetable_has_seat', 'timetable_id', 'seat_id');
    }

    public function studio()
    {
        return $this->belongsTo(Studio::class);
    }

    public function film()
    {
        return $this->belongsTo(Film::class);
    }

    public function transaction()
    {
        return $this->belongsToMany(Transaction::class, 'timetable_has_transaction', 'timetable_id', 'transaction_id');
    }
}
