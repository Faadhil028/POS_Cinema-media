<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transactions';
    public $timestamps = false;
    protected $fillable = [
        "user_id",
        "timetable_id",
        "invoice_code",
        "date",
        "quantity",
        "unit_price",
        "cash",
        "return",
        "total",
        "payment_method",
    ];

    public function transaction_detail()
    {
        return $this->hasMany(Transaction_detail::class);
    }

    public function timetable()
    {
        return $this->belongsToMany(Timetable::class, 'timetable_has_transaction', 'transaction_id', 'timetable_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
