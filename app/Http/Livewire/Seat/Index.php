<?php

namespace App\Http\Livewire\Seat;

use App\Models\Seat;
use Livewire\Component;

class Index extends Component
{
    public $mode = 'create';
    public $search;

    protected $listeners = [
        'created' => 'created',
        "updated" => 'updated',
    ];

    public function render()
    {
        if ($this->search) {
            $seats = Seat::where('row', 'LIKE', '%' . $this->search . '%')->orWhere('number', 'LIKE', '%' . $this->search . '%')->paginate(10);
        } else {
            $seats = Seat::paginate(10);
        }
        return view('livewire.seat.index', compact('seats'));
    }

    public function edit($id)
    {
        $this->mode = 'edit';
        $this->emitTo('seat.edit', 'editSeat', $id);
    }

    public function created()
    {
        $this->reset('mode');
    }

    public function updated()
    {
        $this->reset('mode');
    }
}
