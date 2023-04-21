<?php

namespace App\Http\Livewire\Kasir;

use Carbon\Carbon;
use App\Models\Genre;
use App\Models\Studio;
use Livewire\Component;
use App\Models\Timetable;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Index extends Component
{
    use AuthorizesRequests;
    public $showIndex = true;
    public $price = 0;
    public $filmName = " ";
    public $studio = "Studio 1";
    public $timetable;
    public $genre;
    public $search;
    public $dateNow;
    public $timeNow;

    public function mount()
    {
        $this->timeNow = now()->format('H:i:s');
    }

    public function updateTime()
    {
        $this->timeNow = now()->format('H:i:s');
    }

    // Menampilkan data film dari timetable
    public function render()
    {
        $this->authorize('create.transaction');
        // Date Now
        // $this->dateNow = Carbon::now()->locale('id')->isoFormat('YYYY-MM-DD');
        // Date Dummy agar tampil
        $this->dateNow = Carbon::now()->locale('id')->isoFormat('YYYY-MM-11');

        if ($this->search) {
            $this->genre = null;
            $timetables = Timetable::select('f.title', 'f.description', 'f.genre', 'f.tumbnail', 'f.status', 't.date', DB::raw("GROUP_CONCAT(DISTINCT CONCAT(t.id ,';', t.start_time,';',s.name)) as button"))
                ->from('timetables as t')
                ->join('films as f', 't.film_id', '=', 'f.id')
                ->join('studios as s', 't.studio_id', '=', 's.id')
                ->where(function ($query) {
                    $query->where('f.title', 'LIKE', '%' . $this->search . '%')
                        ->orWhere('f.genre', 'LIKE', '%' . $this->search . '%')
                        ->orWhere('f.description', 'LIKE', '%' . $this->search . '%');
                })
                ->where('f.status', "CURRENTLY AIRING")
                ->where('date', $this->dateNow)
                ->groupBy('f.title', 'f.description', 'f.genre', 'f.tumbnail', 'f.status', 't.date')
                ->get();
        } elseif ($this->genre) {
            $timetables = Timetable::select('f.title', 'f.description', 'f.genre', 'f.tumbnail', 'f.status', 't.date', DB::raw("GROUP_CONCAT(DISTINCT CONCAT(t.id ,';', t.start_time,';',s.name)) as button"))
                ->from('timetables as t')
                ->join('films as f', 't.film_id', '=', 'f.id')
                ->join('studios as s', 't.studio_id', '=', 's.id')
                ->where('f.status', "CURRENTLY AIRING")
                ->where('date', $this->dateNow)
                ->where('f.genre', 'LIKE', '%' . $this->genre . '%')
                ->groupBy('f.title', 'f.description', 'f.genre', 'f.tumbnail', 'f.status', 't.date')
                ->get();
        } else {
            $timetables = Timetable::select('f.title', 'f.description', 'f.genre', 'f.tumbnail', 'f.status', 't.date', DB::raw("GROUP_CONCAT(DISTINCT CONCAT(t.id ,';', t.start_time,';',s.name)) as button"))
                ->from('timetables as t')
                ->join('films as f', 't.film_id', '=', 'f.id')
                ->join('studios as s', 't.studio_id', '=', 's.id')
                ->where('f.status', "CURRENTLY AIRING")
                ->where('date', $this->dateNow)
                ->groupBy('f.title', 'f.description', 'f.genre', 'f.tumbnail', 'f.status', 't.date')
                ->get();
        }

        // [-] Masih belum tahu cara mendapatkan id timetablenya
        // Untuk mendapatkan berapa jumlah kursi yang ada pada jadwal
        // $seatCount = Timetable::find(76)
        //     ->seat()
        //     ->count();

        // Untuk mengetahui jumlah kursi yang sudah sold pada jadwal
        // $seatSold = Transaction::where('timetable_id', 76)
        //     ->sum('quantity');

        $genres = Genre::where('is_active', 1)->get();

        return view('livewire.kasir.index', ['timetables' => $timetables, 'genres' => $genres])
            ->extends('kasir.layouts.main', ['filmName' => $this->filmName])
            ->section('content');
    }

    // Action Untuk Genre
    public function filter($value)
    {
        $this->search = null;
        $genres = Genre::where('id', $value)->get()->toArray();
        foreach ($genres as $genre) {
            $this->genre = $genre["name"];
        }
    }
    public function resetFilter()
    {
        $this->genre = null;
    }

    // Mengirimkan ID untuk menampilkan seat apa saja yang dimiliki film sesuai dengan jadwal/jam tayang pickSeat($param)
    public function pickSeat($id)
    {
        $timetables = Timetable::with(['seat', 'film', 'studio', 'transaction'])->where('id', $id)->get();
        if ($timetables) {
            foreach ($timetables as $timetable) {
                $this->timetable = $timetable;
            }
        }
        // Mengirim ke Seat
        $this->showIndex = false;
        $this->emit('showSeat', $this->timetable);

        // Mengirim data ke Layout Kasir
        $this->emit('updateParams', $this->timetable);
    }
}
