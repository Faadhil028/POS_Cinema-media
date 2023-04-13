<?php

namespace App\Http\Livewire\Transaction;

use App\Models\Transaction_detail;
use Carbon\Carbon;
use Livewire\Component;

class ModalDetail extends Component
{
    public $tdetail;
    public $show;
    public $date;
    protected $listeners = ['showModal' => 'showModal'];

    public function mount()
    {
        $this->tdetail = Transaction_detail::with('transaction')->orderBy("id", "desc")->first();
        $this->show = false;
    }
    public function render()
    {
        return view('livewire.transaction.modal-detail');
    }

    public function showModal($datas)
    {
        foreach ($datas as $data) {
            $this->tdetail = $data;
        }
        $this->date = Carbon::parse($this->tdetail['transaction']['date'])->locale('id')->isoFormat('dddd, D MMMM YYYY');
        $this->show = true;
    }

    public function doShow()
    {
        $this->show = true;
    }

    public function doClose()
    {
        $this->show = false;
    }

    public function doSomething()
    {
        // Do Something With Your Modal
        dd("sukses print tiket");


        // Close Modal After Logic
        $this->doClose();
    }
}
