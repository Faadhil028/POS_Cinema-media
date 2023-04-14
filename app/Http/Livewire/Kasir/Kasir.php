<?php

namespace App\Http\Livewire\Kasir;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Transaction;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Transaction_detail;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class Kasir extends Component
{
    public $seats = [];
    public $price = 0;
    public $filmName, $studioName, $studioClass, $date, $time, $timetableId, $method;
    public $tdetail_id = 0;
    public $total = 0;

    public $amountPaid = 0, $change = 0;
    public $showCash, $showQris;

    protected $listeners = ['updatedSeats' => 'seatsUpdated', 'updateParams' => 'paramsUpdated'];

    protected $rules = [
        'seats' => ['required', 'min:1'],
        'method' => ['required'],
        'amountPaid' => ['required', 'min:5', 'numeric', 'gte:total'],
    ];

    protected $messages = [
        'seats.required' => 'Wajib pilih kursi untuk order',
        'method.required' => 'Wajib pilih metode pembayaran untuk order',
        'amountPaid.*' => 'Masukkan uang pembayaran dengan benar',
    ];

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
        $this->timetableId = $timetable["id"];
        $this->filmName = $timetable["film"]["title"];
        $this->studioName = $timetable["studio"]["name"];
        $this->studioClass = $timetable["studio"]["class"];
        $this->date = Carbon::parse($timetable["date"])->locale('id')->isoFormat('dddd, D MMMM YYYY');
        $this->time = Carbon::parse($timetable["start_time"])->format('H:i:s');

        // Mengetahui harga Weekend atau Tidak
        $weekCek = Carbon::parse($timetable["date"]);
        if ($weekCek->isWeekend()) {
            $this->price = $timetable["studio"]["weekend_price"];
        } else {
            $this->price = $timetable["studio"]["price"];
        }
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
        $this->method = "CASH";
        $this->showQris = false;
        $this->showCash = true;
    }
    public function showQris()
    {
        $this->method = "QRIS";
        $this->showCash = false;
        $this->showQris = true;
    }

    public function resetField()
    {
        $this->reset('total', 'seats', 'amountPaid', 'change');
        $this->emit('resetSeat');
    }

    public function store()
    {

        $this->validate();

        // Membuat Invoice Code
        $lastRecord = Transaction::orderBy("date", 'desc')->first();
        if ($lastRecord && strpos($lastRecord->invoice_code, Carbon::now()->format('dmY')) !== false) {
            $number = (int) substr($lastRecord->invoice_code, -4) + 1;
        } else {
            $number = 1;
        }
        $number = str_pad($number, 4, '0', STR_PAD_LEFT);
        $invoice_code = Carbon::now()->format('D') . Carbon::now()->format('dmY') . $number;

        // Tanggal transaksi sekarang
        $dateNow = Carbon::now()->format('Y-m-d H:i:s');

        $dataTransaction = [
            "user_id" => Auth::id(),
            "timetable_id" => $this->timetableId,
            "invoice_code" => $invoice_code,
            "date" => $dateNow,
            "quantity" => count($this->seats),
            "unit_price" => $this->price,
            "cash" => $this->amountPaid,
            "return" => $this->change,
            "total" => $this->total,
            "payment_method" => $this->method,
        ];

        // Membuat data Transaction
        $transaction = Transaction::create($dataTransaction);

        // Mencari Row dan Number
        $seatsArray = $this->seats;

        $rows = array();
        $numbers = array();

        foreach ($seatsArray as $seat) {
            $row = substr($seat, 0, 1);
            $number = substr($seat, 1);

            array_push($rows, $row);
            array_push($numbers, $number);
        }

        // Mencari id seat
        $seatId = \App\Models\Seat::whereIn('row', $rows)->whereIn('number', $numbers)->pluck('id');

        // Memasukkan setiap seat_id terpilih ke timetable_has_transaction
        foreach (collect($seatId) as $seat_id) {
            $transaction->timetable()->attach($this->timetableId, ['seat_id' => $seat_id]);
        }


        // Memasukkan data ke Transaction Detail
        $lastId = Transaction::orderBy("date", "desc")->value("id");
        $seats = implode(',', $this->seats);

        // Create Data Transaction_detail
        $dataTDetail = [
            "transaction_id" => $lastId,
            "film" => $this->filmName,
            "studio" => $this->studioName,
            "seat" => $seats,
            "start_time" => $this->time,
            "transaction_time" => $dateNow,
        ];
        Transaction_detail::create($dataTDetail);
        $this->tdetail_id = Transaction_detail::orderBy("transaction_time", "desc")->value("id");


        // Memunculkan Modal transaksi Success
        $this->dispatchBrowserEvent('show-swal');
    }
}
