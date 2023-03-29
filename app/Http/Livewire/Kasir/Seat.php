<?php

namespace App\Http\Livewire\Kasir;

use Livewire\Component;

class Seat extends Component
{
    public $showSeat = false;
    public $pickSeats = [];

    protected $listeners = ['showSeat' => 'showSeatComponent'];
    public function render()
    {
        return view('livewire.kasir.seat')
            // ->extends('kasir.layouts.main', ['price' => $this->price, 'filmName' => $this->filmName])
            ->section('content');
    }

    public function showSeatComponent()
    {
        $this->showSeat = true;
    }

    public function updateSeats()
    {
        $this->emit('updatedSeats', $this->pickSeats);
    }
}
