<?php

namespace App\Http\Livewire\Studio;

use App\Models\Studio;
use Livewire\Component;

class Index extends Component
{
    public $search;
    public function render()
    {
        if ($this->search) {
            $studios = Studio::where('name', 'LIKE', '%' . $this->search . '%')
                ->orWhere('class', 'LIKE', '%' . $this->search . '%')
                ->orWhere('price', 'LIKE', '%' . $this->search . '%')
                ->orWhere('is_active', 'LIKE', '%' . $this->search . '%')
                ->orWhere('weekend_price', 'LIKE', '%' . $this->search . '%')
                ->get()->paginate(10);
        } else {
            $studios = Studio::paginate(10);
        }
        return view('livewire.studio.index', compact('studios'));
    }
}
