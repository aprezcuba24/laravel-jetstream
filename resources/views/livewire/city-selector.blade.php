<div class="space-y-3 border p-2 rounded">
    <div class="col-span-6 sm:col-span-4">
        <x-label for="city_id" value="{{ __('Country') }}" />
        <livewire:autocomplete-select 
            :model="\App\Models\Country::class"
            searchField="name"
            wire:model.live="countryId"
        />
    </div>
    <div class="col-span-6 sm:col-span-4">
        <x-label for="city_id" value="{{ __('State') }}" />
        <livewire:autocomplete-select 
            :model="\App\Models\State::class"
            searchField="name"
            dependsOn="country_id"
            :dependsValue="$countryId"
            wire:model.live="stateId"
        />
    </div>
    <div class="col-span-6 sm:col-span-4">
        <x-label for="city_id" value="{{ __('City') }}" />
        <livewire:autocomplete-select 
            :model="\App\Models\City::class"
            searchField="name"
            dependsOn="state_id"
            :dependsValue="$stateId"
            wire:model.live="value"
        />
    </div>
</div>
