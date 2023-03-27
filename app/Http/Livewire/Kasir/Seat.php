<?php

namespace App\Http\Livewire\Kasir;

use Livewire\Component;

class Seat extends Component
{
    public $pickSeats = [];
    public $price = 25000;

    public function render()
    {
        return view('livewire.kasir.seat')->extends('kasir.layouts.main')->section('content');
    }

    public function updateSeats()
    {
        $this->emit('updatedSeats', $this->pickSeats);
    }
}
