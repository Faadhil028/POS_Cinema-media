<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Studio extends Model
{
    use HasFactory;

    protected $table = 'studios';
    public $timestamps = false;
    protected $fillable = [
        "name", "class", "is_active", "price", "weekend_price"
    ];

    public function timetable()
    {
        return $this->hasMany(Timetable::class);
    }
}
