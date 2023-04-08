<?php

namespace App\Http\Livewire\Transaction;

use Livewire\Component;
use App\Models\Transaction;
use App\Models\Transaction_detail;

class Index extends Component
{
    public function render()
    {
        $transactions = Transaction::orderBy("date", "desc")->get();
        return view(
            'livewire.transaction.index',
            [
                "transactions" => $transactions,
            ]
        );
    }

    public function showDetail($id)
    {
        $tdetail = Transaction_detail::with('transaction')->where('transaction_id', $id)->get();
        $this->emit('showModal', $tdetail);
    }
}
