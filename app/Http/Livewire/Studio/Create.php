<?php

namespace App\Http\Livewire\Studio;

use App\Models\Studio;
use Livewire\Component;

class Create extends Component
{
    public $name, $class, $is_active, $price, $weekend_price;

    protected $rules = [
        'name' => 'required',
        'class' => 'required',
        'price' => 'required',
        'weekend_price' => 'required',
    ];
    public function render()
    {
        return view('livewire.studio.create');
    }


    public function store()
    {
        $this->validate();
        $data = [
            "name" => $this->name,
            "class" => $this->class,
            "is_active" => $this->is_active ? 1 : 0,
            "price" => $this->price,
            "weekend_price" => $this->weekend_price,
        ];
        Studio::create($data);
        return redirect()->route('admin.studios.index')->with('success', 'Studio Berhasil Ditambahkan');
    }
}
