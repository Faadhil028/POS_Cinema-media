<?php

namespace App\Http\Livewire\Kasir;

use Livewire\Component;

class Index extends Component
{
    // Menampilkan data film dari timetable
    public function render()
    {
        return view('livewire.kasir.index')->extends('kasir.layouts.main')->section('content');
    }

    // Mengirimkan ID untuk menampilkan seat apa saja yang dimiliki film sesuai dengan jadwal/jam tayang pickSeat($param)
    public function pickSeat()
    {
        return redirect(route('seat'));
    }
}
