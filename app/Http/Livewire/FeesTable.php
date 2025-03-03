<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Fee;

class FeesTable extends DataTableComponent
{
    protected $model = Fee::class;
    protected $listeners = ['refreshDatatable' => '$refresh'];

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setPaginationEnabled(true);
    }

    public function query()
    {
        return Fee::with('user'); // Carga la relación con el usuario (cliente)
    }

    public function columns(): array
    {
        return [
            Column::make('ID', 'id')->sortable(),
            Column::make('Concept', 'concept')->searchable(),
            Column::make('Client Name', 'user.name')->searchable(),
            Column::make('Due Date', 'due_date')->sortable(),
            Column::make('Import')
                ->format(fn($fee) => number_format($fee, 2).'€'),
            Column::make('Actions')
                ->label(fn($row) => view('livewire.fee-actions', ['fee' => $row]))
                ->excludeFromColumnSelect(),
        ];
    }
    
}
