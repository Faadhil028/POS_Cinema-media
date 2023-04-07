<?php

namespace App\Http\Livewire\Kasir;

use Carbon\Carbon;
use Livewire\Component;

class Kasir extends Component
{
    public $seats = [];
    public $price = 0;
    public $filmName, $studioName, $studioClass, $date, $time;
    public $total = 0;

    public $amountPaid = 0, $change = 0;
    public $showCash, $showQris;

    protected $listeners = ['updatedSeats' => 'seatsUpdated', 'updateParams' => 'paramsUpdated'];

    public function seatsUpdated($value)
    {
        $this->seats = $value;
        usort($this->seats, function ($a, $b) {
            // memisahkan karakter dan angka pada string
            preg_match('/^([a-zA-Z]+)(\d+)$/', $a, $aMatches);
            preg_match('/^([a-zA-Z]+)(\d+)$/', $b, $bMatches);

            $aChar = $aMatches[1];
            $aNum = $aMatches[2];
            $bChar = $bMatches[1];
            $bNum = $bMatches[2];

            // membandingkan karakter
            $charCmp = strcmp($aChar, $bChar);
            if ($charCmp !== 0) {
                return $charCmp;
            }

            // membandingkan angka
            return $aNum - $bNum;
        });

        $this->total = count($this->seats) * $this->price;
    }
    public function paramsUpdated($timetable)
    {
        $this->filmName = $timetable["film"]["title"];
        $this->price = $timetable["studio"]["price"];
        $this->studioName = $timetable["studio"]["name"];
        $this->studioClass = $timetable["studio"]["class"];
        $this->date = $timetable["date"];
        $this->time = Carbon::parse($timetable["start_time"])->format('H:i:s');
    }
    public function mount($filmName)
    {
        $this->showCash = false;
        $this->showQris = false;
        $this->filmName = $filmName;
    }
    public function render()
    {
        return view('livewire.kasir.kasir');
    }

    public function calculateChange()
    {
        if ($this->amountPaid) {
            $this->change = $this->amountPaid - $this->total;
        } else {
            $this->amountPaid = 0;
        }
    }

    public function showCash()
    {
        $this->showQris = false;
        $this->showCash = true;
    }
    public function showQris()
    {
        $this->showCash = false;
        $this->showQris = true;
    }

    public function store()
    {
        dd($this->seats, $this->total, $this->change);
    }
}
