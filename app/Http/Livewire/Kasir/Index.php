<?php

namespace App\Http\Livewire\Kasir;

use Livewire\Component;

class Index extends Component
{
    public $showIndex = true;
    public $price = 0;
    public $filmName = "Silahkan Pilih Film";
    public $search;

    // Menampilkan data film dari timetable
    public function render()
    {
        return view('livewire.kasir.index')
            ->extends('kasir.layouts.main', ['price' => $this->price, 'filmName' => $this->filmName])
            ->section('content');
    }

    // Mengirimkan ID untuk menampilkan seat apa saja yang dimiliki film sesuai dengan jadwal/jam tayang pickSeat($param)
    public function pickSeat($id)
    {
        // Mengirim ke Seat
        $this->showIndex = false;
        $this->emit('showSeat');

        // Mengirim data ke Layout Kasir
        $this->filmName = "Mahakam";
        $this->price = 25000;
        $this->emit('updateParams', $this->filmName, $this->price);
        // return redirect(route('pos.seat'));
    }
}
