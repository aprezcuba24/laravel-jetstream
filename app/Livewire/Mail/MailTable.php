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
        return Mail::query()->where('user_id', auth()->id());
    }


    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
        ];
    }
}
