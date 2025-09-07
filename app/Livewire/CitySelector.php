<?php

namespace App\Livewire;

use Livewire\Attributes\Modelable;
use Livewire\Component;

class CitySelector extends Component
{
    public $countryId;
    public $stateId;
    #[Modelable]
    public $value;

    protected $listeners = ['selected'];

    public function mount()
    {
        $this->countryId = null;
        $this->stateId = null;
        if ($this->value) {
            $model = \App\Models\City::find($this->value);
            $this->stateId = $model->state_id;
            $this->countryId = $model->state->country_id;
        }
    }

    public function selected($model, $id)
    {
        if ($model === \App\Models\Country::class) {
            $this->countryId = $id;
            $this->stateId = null;
            $this->value = null;
        } elseif ($model === \App\Models\State::class) {
            $this->stateId = $id;
            $this->value = null;
        } elseif ($model === \App\Models\City::class) {
            $this->value = $id;
        }
    }

    public function render()
    {
        return view('livewire.city-selector');
    }
}
