<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Status;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;

class StatusesTable extends DataTableComponent
{
    protected $model = Status::class;
    protected $listeners = ['refreshDatatable' => '$refresh'];

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setPaginationEnabled(true);
        $this->setPerPageAccepted([10, 25, 50, 100]);
        $this->setPerPage(10);
        $this->setTableWrapperAttributes([
            'default' => false,
            'class' => 'table-responsive',
        ]);
    }

    public function builder(): Builder
    {
        return Status::query();
    }

    // Método para añadir botón de creación en el encabezado
    public function getTableHeading(): string
    {
        return view('components.header-with-create-button')->render();
    }

    public function columns(): array
    {
        return [
            Column::make('ID', 'id')->sortable(),
            Column::make('Code', 'code')->sortable()->searchable(),
            Column::make('Name', 'name')->sortable()->searchable(),
            Column::make('Color', 'color')
                ->format(
                    fn($value) => !empty($value)
                        ? '<i class="fa-solid fa-palette fa-xl" style="color: ' . e($value) . ';"></i>'
                        : '<span class="px-2 py-1 rounded text-white text-xs font-bold bg-gray-500">Not selected yet</span>'
                )
                ->html(),
            Column::make('Actions')
                ->label(fn($row) => view('components.status-actions', ['status' => $row]))
                ->excludeFromColumnSelect(),
        ];
    }
}
