<?php

namespace App\Http\Controllers\admin;

use App\Models\Seat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SeatController extends Controller
{
    public function index()
    {
        $this->authorize('read.seat');
        return view('admin.seats.index');
    }

    public function create()
    {
        $this->authorize('create.seat');
        return view('admin.seats.create');
    }
    public function edit()
    {
        $this->authorize('update.seat');
        return view('admin.seats.edit');
    }

    public function destroy(Seat $seat)
    {
        $seat->delete();
        return redirect()->route('admin.seats.index')->with('message', "Seat berhasil dihapus");
    }
}
