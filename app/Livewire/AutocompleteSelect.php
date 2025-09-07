<?php

namespace App\Livewire;

use Livewire\Attributes\Modelable;
use Livewire\Attributes\Reactive;
use Livewire\Component;

class AutocompleteSelect extends Component
{
    public $model;
    public $searchField = 'name';

    #[Modelable]
    public $value = '';
    public $selectedLabel;
    public $query = '';
    public $results = [];
    public $dependsOn;

    #[Reactive]
    public $dependsValue;

    public function mount()
    {
        if ($this->value) {
            $model = $this->model::find($this->value);
            $this->selectedLabel = $model->{$this->searchField};
            $this->query = $this->selectedLabel;
        }
    }

    public function updatedQuery()
    {
        $this->updateResults();
    }

    public function updateResults()
    {
        if (!$this->query || ($this->dependsOn && !$this->dependsValue)) {
            return [];
        }
        /** @var \Illuminate\Database\Eloquent\Builder $query */
        $query = $this->model::query();

        if ($this->dependsOn && $this->dependsValue) {
            $query->where($this->dependsOn, $this->dependsValue);
        }

        $this->results = $query
            ->where($this->searchField, 'like', '%' . $this->query . '%')
            ->orderBy($this->searchField)
            ->limit(10)
            ->get();
    }

    public function select($id)
    {
        $model = $this->model::find($id);
        $this->value = $model->id;
        $this->selectedLabel = $model->{$this->searchField};
        $this->query = $this->selectedLabel;
        $this->results = [];
    }

    public function render()
    {
        return view('livewire.autocomplete-select');
    }
}

