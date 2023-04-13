<?php

namespace App\Http\Livewire\Kasir;

use Livewire\Component;
// use App\Models\Seat as ModelsSeat;
// use App\Models\Transaction_detail;
use Illuminate\Support\Facades\DB;

class Seat extends Component
{
    public $showSeat = false;
    public $seats;
    public $pickSeats = [];
    public $seatSold = [];
    public $transactionId, $timetableId;

    protected $listeners = ['showSeat' => 'showSeatComponent', "resetSeat" => "resetSeat"];
    public function render()
    {
        // dd($this->seatSold);
        return view('livewire.kasir.seat', ['seats' => $this->seats])
            // ->extends('kasir.layouts.main', ['price' => $this->price, 'filmName' => $this->filmName])
            ->section('content');
    }

    public function showSeatComponent($timetable)
    {
        // foreach ($timetable["transaction"] as $transaction) {
        //     $timetableId = $transaction["timetable_id"];
        // }


        // Untuk mengetahui kursi yang sudah Sold
        $transactionDetails = DB::table('transaction_detail')
            ->select('transactions.timetable_id', DB::raw('GROUP_CONCAT(DISTINCT transaction_detail.seat ORDER BY transaction_detail.seat ASC SEPARATOR ",") AS seats'))
            ->join('transactions', 'transactions.id', '=', 'transaction_detail.transaction_id')
            ->join('timetables', 'timetables.id', '=', 'transactions.timetable_id')
            ->where('transactions.timetable_id', '=', $timetable["id"])
            ->groupBy('transactions.timetable_id')
            ->get();
        foreach ($transactionDetails as $transaction) {
            $this->seatSold = explode(',', $transaction->seats);
            // dd($this->seatSold);
        }

        // Mengirim seats sesuai studio timetable terdaftar
        $this->seats = $timetable["seat"];
        $this->showSeat = true;
    }

    public function updateSeats()
    {
        $this->emit('updatedSeats', $this->pickSeats);
    }

    public function resetSeat()
    {
        $this->reset('pickSeats');
    }
}
