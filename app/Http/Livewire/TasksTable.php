<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class TasksTable
 *
 * Componente Livewire que gestiona la tabla interactiva de tareas utilizando
 * Laravel Livewire Tables. Permite paginación, búsqueda, ordenación y
 * visualización personalizada de columnas, además de aplicar restricciones
 * según el rol del empleado autenticado.
 *
 * @package App\Http\Livewire
 */
class TasksTable extends DataTableComponent
{
    /**
     * Modelo principal utilizado para la tabla.
     *
     * @var string
     */
    protected $model = Task::class;

    /**
     * Eventos escuchados por el componente.
     *
     * @var array
     */
    protected $listeners = ['refreshDatatable' => '$refresh'];

    /**
     * Configura opciones básicas de la tabla como paginación y estilos.
     *
     * @return void
     */
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
    /**
     * Define la consulta base que alimenta la tabla.
     *
     * Filtra las tareas dependiendo del rol del empleado autenticado:
     * - Si no es un operador, muestra todas.
     * - Si es operador, muestra solo sus tareas no completadas.
     *
     * @return Builder Consulta Eloquent configurada.
     */
    public function builder(): Builder
    {
        $employee = Auth::guard('employee')->user();

        if (!$employee) {
            return Task::query()->whereRaw('1 = 0');
        }

        $query = Task::query()->with('status');

        if (!$employee->hasRole('operator')) {
            return $query->orderByRaw('employee_id IS NOT NULL, employee_id ASC');
        } else {
            return $query->where('employee_id', $employee->id)
                ->whereHas('status', fn($q) => $q->where('name', '!=', 'Completada'));
        }
    }

    /**
     * Devuelve el encabezado personalizado de la tabla, incluyendo un botón de creación.
     *
     * @return string HTML renderizado del encabezado.
     */
    public function getTableHeading(): string
    {
        return view('components.header-with-create-button')->render();
    }
    /**
     * Define las columnas que se muestran en la tabla.
     *
     * Incluye:
     * - ID de la tarea.
     * - Descripción con límite de caracteres.
     * - Estado con badge visual.
     * - Usuario asociado.
     * - Operador asignado.
     * - Acciones disponibles.
     *
     * @return array Listado de columnas de la tabla.
     */
    public function columns(): array
    {
        return [
            Column::make('ID', 'id')->sortable(),
            Column::make('Description', 'description')
                ->searchable()
                ->format(fn($value) => '<span title="' . e($value) . '">' . Str::limit($value, 30, '...') . '</span>')
                ->html(),
            Column::make('Status', 'status_id')
                ->searchable()
                ->format(
                    fn($value, $row) =>
                    view('components.status-badge', ['statuses' => [$row->status]])->render()
                )
                ->html(),

            Column::make('User', 'user.name')->searchable(),
            Column::make('Operator', 'employee.name')->searchable(),
            Column::make('Actions')
                ->label(fn($row) => view('components.task-actions', ['task' => $row]))
                ->excludeFromColumnSelect(),
        ];
    }
}
