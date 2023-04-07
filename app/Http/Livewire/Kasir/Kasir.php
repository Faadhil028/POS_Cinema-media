<?php

namespace App\Http\Livewire\Kasir;

use App\Models\Transaction;
use App\Models\Transaction_detail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Validation\Rule;

class Kasir extends Component
{
    public $seats = [];
    public $price = 0;
    public $filmName, $studioName, $studioClass, $date, $time, $timetableId, $method;
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

    public function store()
    {
        $this->validate();
        $lastRecord = Transaction::orderBy("date", 'desc')->first();
        if ($lastRecord && strpos($lastRecord->invoice_code, Carbon::now()->format('dmY')) !== false) {
            $number = (int) substr($lastRecord->invoice_code, -4) + 1;
        } else {
            $number = 1;
        }
        $number = str_pad($number, 4, '0', STR_PAD_LEFT);
        $invoice_code = "TUE" . Carbon::now()->format('dmY') . $number;

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
        Transaction::create($dataTransaction);
        // Untuk Many to Many mengirim data ke timetables_has_transaction
        // $transaction = Transaction::create($dataTransaction);
        // $transaction->timetable()->attach($this->timetableId);

        $lastId = Transaction::orderBy("date", "desc")->value("id");
        $seats = implode(',', $this->seats);

        // dd($dateNow);
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
    }
}
