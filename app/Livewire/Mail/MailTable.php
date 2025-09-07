<?php

namespace App\Livewire\Mail;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Mail;
use Illuminate\Database\Eloquent\Builder;

class MailTable extends DataTableComponent
{
    protected $model = Mail::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setLayout('livewire.mail.mail-table')
        ;
    }

    public function builder(): Builder
    {
        $query = Mail::query();
        if (!auth()->user()->hasRole('Admin')) {
            $query->where('user_id', auth()->id());
        }
        return $query->with('user:id,name');
    }


    public function columns(): array
    {
        $user = auth()->user();
        $columns = [];
        if ($user->hasRole('Admin')) {
            $columns[] = Column::make("User", "user_id")
                // ->label(fn($row) => $row->user->name)
            ;
        }

        return [
            Column::make("Id", "id")
                ->sortable(),
            ...$columns,
            Column::make("Subject", "subject"),
            Column::make("To", "to"),
            Column::make("Body", "body"),
            Column::make("Status", "status"),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
        ];
    }
}
