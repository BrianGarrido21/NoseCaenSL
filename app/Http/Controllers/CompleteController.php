<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * Class CompleteController
 *
 * Controlador encargado de completar una tarea y adjuntar archivos relacionados.
 *
 * @package App\Http\Controllers
 */
class CompleteController extends Controller
{
    /**
     * Muestra el formulario para completar una tarea.
     *
     * @param Task $task Tarea que se va a completar.
     *
     * @return \Illuminate\View\View Vista del formulario de completado de tarea.
     */
    public function show(Task $task)
    {
        return view('employee.task.complete', compact('task'));
    }

    /**
     * Guarda la información de la tarea completada.
     *
     * Valida la información del formulario, actualiza las notas finales de la tarea,
     * cambia su estado a "Completed" y guarda los archivos adjuntos si los hubiera.
     *
     * @param Request $request Datos enviados desde el formulario.
     * @param int $id ID de la tarea a completar.
     *
     * @return \Illuminate\Http\RedirectResponse Redirección al listado de tareas con mensaje de éxito.
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException Si la tarea no existe.
     */
    public function store(Request $request, $id)
    {
        $request->validate([
            'post_notes' => 'required|string',
            'attachment.*' => 'required|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048',
        ]);

        $task = Task::findOrFail($id);
        $task->post_notes = $request->post_notes;
        $task->status()->associate(Status::where('name', 'Completed')->first());
        
        if ($request->hasFile('attachment')) {
            $filePaths = [];
            $folderPath = 'task_files/Task_' . $task->id; 
            foreach ($request->file('attachment') as $file) {
                $filePaths[] = $file->store($folderPath, 'public'); 
            }

            $task->summary_uri = json_encode($filePaths);
        }

        $task->save();

        return redirect()->route('task.index')->with('success', 'Task completed successfully.');
    }
}
