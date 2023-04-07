<?php

namespace App\Http\Livewire\Kasir;

use App\Models\Seat as ModelsSeat;
use Livewire\Component;

class Seat extends Component
{
    public $showSeat = false;
    public $seats;
    public $pickSeats = [];

    protected $listeners = ['showSeat' => 'showSeatComponent'];
    public function render()
    {
        // dd(ModelsSeat::all());
        // $seats = ModelsSeat::all();
        return view('livewire.kasir.seat', ['seats' => $this->seats])
            // ->extends('kasir.layouts.main', ['price' => $this->price, 'filmName' => $this->filmName])
            ->section('content');
    }

    public function showSeatComponent($timetable)
    {
        // dd($timetable["seat"]);
        $this->seats = $timetable["seat"];
        $this->showSeat = true;
    }

    public function updateSeats()
    {
        $this->emit('updatedSeats', $this->pickSeats);
    }
}
