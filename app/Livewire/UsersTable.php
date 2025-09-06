<?php

namespace App\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\User;

class UsersTable extends DataTableComponent
{
    protected $model = User::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setLayout('livewire.user-table')
        ;
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Name", "name")
                ->sortable()
                ->searchable(),
            Column::make("Email", "email")
                ->sortable()
                ->searchable(),
            Column::make("Age", "age")
                ->label(fn($row) => $row->age)
                ->sortable(function($query, $direction) {
                    return $query->orderBy('date_of_birth', $direction === 'asc' ? 'desc' : 'asc');
                }),
            Column::make("Identifier", "identifier")
                ->sortable(),
            Column::make("Phone number", "phone_number")
                ->sortable()
                ->searchable(),
            Column::make("Identity card", "identity_card")
                ->sortable()
                ->searchable(),
            Column::make("Date of birth", "date_of_birth")
                ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
        ];
    }
}
