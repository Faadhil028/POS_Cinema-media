<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class transactions extends Controller
{
    public function index()
    {
        $this->authorize('read.transaksi');
        return view('admin.transactions.index');
    }
}
