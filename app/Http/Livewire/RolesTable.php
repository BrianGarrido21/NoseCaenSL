<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Role;
use Illuminate\Database\Eloquent\Builder;

class RolesTable extends DataTableComponent
{
    protected $model = Role::class;
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
        return Role::query()->select(['id', 'name', 'guard_name', 'color']);
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
            Column::make('Name', 'name')->searchable(),
            Column::make('Guard Name', 'guard_name')->searchable(),
            Column::make('Color')
                ->format(
                    fn($value) => !empty($value)
                        ? '<i class="fa-solid fa-palette fa-xl" style="color: ' .$value['color'] . ';"></i>'
                        : '<span class="px-2 py-1 rounded text-white text-xs font-bold bg-gray-500">Not selected yet</span>'
                )
                ->html(),
            Column::make('Actions')
                ->label(fn($row) => view('components.role-actions', ['role' => $row]))
                ->excludeFromColumnSelect(),
        ];
    }
}
