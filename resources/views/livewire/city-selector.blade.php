<div class="space-y-3">
    <livewire:autocomplete-select 
        :model="\App\Models\Country::class"
        searchField="name"
        wire:model.live="countryId"
    />
    <livewire:autocomplete-select 
        :model="\App\Models\State::class"
        searchField="name"
        dependsOn="country_id"
        :dependsValue="$countryId"
        wire:model.live="stateId"
    />
    <livewire:autocomplete-select 
        :model="\App\Models\City::class"
        searchField="name"
        dependsOn="state_id"
        :dependsValue="$stateId"
        wire:model.live="value"
    />
    <p class="text-green-600">Pais seleccionado: ID {{ $countryId }}</p>
    <p class="text-green-600">Estado seleccionado: ID {{ $stateId }}</p>
    <p class="text-green-600">Ciudad seleccionada: ID {{ $value }}</p>
</div>
