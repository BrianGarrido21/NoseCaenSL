<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\User;

class UsersTable extends DataTableComponent
{
    protected $model = User::class;

    protected $listeners = ['refreshTable' => '$refresh', 'confirmDeleteUser' => 'deleteUser'];

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setPaginationEnabled(true);
        $this->setPerPageAccepted([10, 25, 50, 100]);
        $this->setPerPage(10);
        $this->setTableWrapperAttributes([
            'class' => 'table-responsive',
        ]);
    }

    public function columns(): array
    {
        return [
            Column::make('ID', 'id')->sortable(),
            Column::make('CIF', 'cif')
                ->searchable()
                ->format(fn ($value) => $value ?: 'No CIF'),
            Column::make('Name', 'name')->searchable(),
            Column::make('Email', 'email')->searchable(),
            Column::make('Country', 'country.nombre')
                ->searchable()
                ->format(fn ($value) => $value ?: 'Not selected'),
            Column::make('Actions')
                ->label(fn ($row) => view('components.user-actions', ['user' => $row]))
                ->excludeFromColumnSelect(),
        ];
    }

    public function deleteUser($userId)
    {
        User::find($userId)?->delete();
        $this->emit('refreshTable');
    }
}
