<?php

namespace App\Http\Livewire\Seat;

use App\Models\Seat;
use Livewire\Component;

class Edit extends Component
{
    public $seat_id, $row, $number;

    protected $listeners = [
        'editSeat' => 'seatEdit',
    ];

    protected $rules = [
        'row' => 'required',
        'number' => 'required'
    ];
    public function render()
    {
        return view('livewire.seat.edit');
    }

    public function seatEdit($id)
    {
        $this->seat_id = $id;
        $seat = Seat::find($id);
        if ($seat) {
            $this->row = $seat->row;
            $this->number = $seat->number;
        }
    }

    public function update()
    {
        $this->validate();
        $data = [
            "row" => strtoupper($this->row),
            "number" => $this->number,
        ];
        $seat = Seat::find($this->seat_id);
        $seat->update($data);
        $this->emitTo('seat.index', 'updated');

        return session()->flash('success', 'Kursi berhasil diubah');
    }
}
