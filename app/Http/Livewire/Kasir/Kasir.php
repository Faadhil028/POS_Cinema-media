<?php

namespace App\Http\Livewire\Kasir;

use Livewire\Component;

class Kasir extends Component
{
    public $seats = [];
    public $price;
    public $total = 0;

    protected $listeners = ['updatedSeats' => 'seatsUpdated'];

    public function seatsUpdated($value)
    {
        $this->seats = $value;
        $this->total = count($this->seats) * $this->price;
    }
    public function mount($price)
    {
        $this->price =  $price;
    }
    public function render()
    {
        return view('livewire.kasir.kasir');
    }


    public function store()
    {
        dd($this->seats, $this->total);
    }
}
