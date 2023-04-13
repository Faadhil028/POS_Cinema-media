<?php

namespace App\Http\Livewire\Studio;

use App\Models\Studio;
use Livewire\Component;

class Edit extends Component
{
    public $studio_id, $name, $class, $is_active, $price, $weekend_price;

    protected $rules = [
        'name' => 'required',
        'class' => 'required',
        'price' => 'required',
        'weekend_price' => 'required',
    ];

    public function mount($studio)
    {
        $this->studio_id = $studio->id;
        $this->name = $studio->name;
        $this->class = $studio->class;
        $this->is_active = $studio->is_active;
        $this->price = $studio->price;
        $this->weekend_price = $studio->weekend_price;
    }
    public function render()
    {
        return view('livewire.studio.edit');
    }

    public function update()
    {
        $this->validate();
        $data = [
            "name" => $this->name,
            "class" => $this->class,
            "is_active" => $this->is_active ? 1 : 0,
            "price" => $this->price,
            "weekend_price" => $this->weekend_price,
        ];
        $studio = Studio::find($this->studio_id);
        $studio->update($data);

        return redirect()->route('admin.studios.index')->with('success', 'Studio Berhasil Diupdate');
    }
}
