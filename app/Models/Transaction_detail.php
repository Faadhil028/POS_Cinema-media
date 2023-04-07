<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction_detail extends Model
{
    use HasFactory;

    protected $table = 'transaction_detail';
    public $timestamps = false;

    protected $fillable = [
        "transaction_id",
        "film",
        "studio",
        "seat",
        "start_time",
        "transaction_time",
    ];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }
}
