<?php

namespace App\Http\Livewire\Timetable;

use App\Models\Timetable;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $timetables = Timetable::with(['film', 'studio', 'transaction'])->orderBy('start_time')->get();
        return view('livewire.timetable.index', compact('timetables'));
    }
}
