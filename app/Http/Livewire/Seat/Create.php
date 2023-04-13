<?php

namespace App\Http\Livewire\Seat;

use App\Models\Seat;
use Livewire\Component;

class Create extends Component
{
    public $row;
    public $number;
    public function render()
    {
        return view('livewire.seat.create');
    }

    protected $rules = [
        "row" => 'required',
        "number" => 'required'
    ];

    public function store()
    {
        $this->validate();
        for ($i = 1; $i <= $this->number; $i++) {
            $data = [
                "row" => strtoupper($this->row),
                "number" => $i,
            ];
            Seat::create($data);
        }
        $this->emitTo('index', 'created');
        $this->reset();

        return session()->flash('success', 'Kursi berhasil ditambah');
    }
}
