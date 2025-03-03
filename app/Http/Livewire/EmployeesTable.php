<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Employee;

class EmployeesTable extends DataTableComponent
{
    protected $model = Employee::class;
    protected $listeners = ['refreshDatatable' => '$refresh'];

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setPaginationEnabled(true);
    }

    public function query()
    {
        return Employee::with('roles'); // Aseguramos que cargue la relación de roles correctamente
    }

    public function columns(): array
    {
        return [
            Column::make('ID', 'id')->sortable(),
            Column::make('DNI', 'dni')->searchable(),
            Column::make('Name', 'name')->searchable(),
            Column::make('Email', 'email')->searchable(),
            Column::make('Role')
            ->label(fn($row) => $row->roles->isNotEmpty()
                ? view('components.role-badge', ['roles' => $row->roles])
                : '<span class="px-2 py-1 rounded text-white text-xs font-bold bg-gray-500">Not selected yet</span>'
            )
            ->html(),
            Column::make('Actions')
                ->label(fn($row) => view('livewire.employee-actions', ['employee' => $row]))
                ->excludeFromColumnSelect(),
        ];
    }
}
