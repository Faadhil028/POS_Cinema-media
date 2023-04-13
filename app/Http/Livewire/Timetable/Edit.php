<?php

namespace App\Http\Livewire\Timetable;

use Livewire\Component;
use App\Models\Film;
use App\Models\Studio;

class Edit extends Component
{
    public $film, $studio, $time, $showDateInputs, $start_date, $end_date;
    public function render()
    {
        $films = Film::where('status', "COMING SOON")
            ->orWhere('status', "CURRENTLY AIRING")
            ->get();
        $studios = Studio::where('is_active', 1)->get();
        return view('livewire.timetable.edit', [
            "films" => $films,
            "studios" => $studios,
        ]);
    }

    public function updatedFilm($value)
    {
        // dd($this->start_date);
        if (!empty($value)) {
            $film = Film::where('id', $value)->first();
            $this->start_date = Carbon::parse($film->start_date)->format('Y-m-d');
            $this->end_date = Carbon::parse($film->end_date)->format('Y-m-d');
            $this->showDateInputs = true;
        } else {
            $this->showDateInputs = false;
        }
    }
}
