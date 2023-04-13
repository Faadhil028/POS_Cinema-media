<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class transactions extends Controller
{
    public function index()
    {
        $this->authorize('read.transaksi');
        return view('admin.transactions.index');
    }
}
