<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class transactions extends Controller
{
    public function index(Request $request)
    {
        $this->authorize('read.transaction');
        return view('admin.transactions.index');
    }
}
