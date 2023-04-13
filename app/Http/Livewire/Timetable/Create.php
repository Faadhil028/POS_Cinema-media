<?php

namespace App\Http\Livewire\Timetable;

use Carbon\Carbon;
use App\Models\Film;
use App\Models\Seat;
use App\Models\Studio;
use Livewire\Component;
use App\Models\Timetable;

class Create extends Component
{
    public $film, $studio, $time, $showDateInputs, $start_date, $end_date;
    public function render()
    {
        $films = Film::where('status', "COMING SOON")
            ->orWhere('status', "CURRENTLY AIRING")
            ->get();
        $studios = Studio::where('is_active', 1)->get();
        return view('livewire.timetable.create', [
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

    protected $rules = [
        "film" => 'required',
        "studio" => 'required',
        "time" => 'required',
    ];

    public function store()
    {
        $this->validate();

        // Untuk membuat jadwal dari start_date sampai end_date film
        $start_date = Carbon::parse($this->start_date);
        $end_date = Carbon::parse($this->end_date);

        // Untuk attach
        $studio_class = Studio::where('id', $this->studio)->pluck('class')->first();
        // dd($studio_class);
        $seats = Seat::all();

        // Perulangan date dari start_date sampai end_date
        while ($start_date->lte($end_date)) {
            $start_date->toDateString();

            // Membuat menjadi Y-m-d H:i:s
            $start_time = Carbon::parse($start_date)->setTimeFromTimeString($this->time);
            $data = [
                "film_id" => $this->film,
                "studio_id" => $this->studio,
                "date" => $start_date,
                "start_time" => $start_time,
            ];
            $timetable = Timetable::create($data);

            $start_date->addDay();

            // Perulangan untuk memasukkan seat ke timetable_has_seat
            if ($studio_class === "REGULAR") {
                $i = 0;
                foreach ($seats as $seat) {
                    $seat_id = $seat->id;
                    // $timetable->seat()->attach($this->studio, ["seat_id" => $seat_id]);
                    $timetable->seat()->attach($seat_id, ['timetable_id' => $timetable->id, 'studio_id' => $this->studio]);

                    $i++;

                    if ($i === 50) {
                        continue 2;
                    }
                }
            } elseif ($studio_class === "PREMIUM") {
                $i = 0;
                foreach ($seats as $seat) {
                    $seat_id = $seat->id;
                    // $timetable->seat()->attach($this->studio, ["seat_id" => $seat_id]);
                    $timetable->seat()->attach($seat_id, ['timetable_id' => $timetable->id, 'studio_id' => $this->studio]);

                    $i++;

                    if ($i === 40) {
                        continue 2;
                    }
                }
            }
        }

        return redirect()->route('admin.timetables.index')->with('success', 'Jadwal berhasil dibuat');
    }
}
