<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Transaction_detail;

class TicketController extends Controller
{
    public function show($id)
    {
        $tickets = Transaction_detail::with('transaction')->where('id', $id)->first();

        // $pdf = Pdf::loadView('ticket', ["tickets" => $tickets]);
        // return $pdf->download('ticekt-' . $tickets->transaction["invoice_code"] . '.pdf');
        return view('ticket', ["tickets" => $tickets]);
    }
}
