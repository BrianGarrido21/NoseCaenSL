<?php

namespace App\Jobs;

use App\Mail\FeeNotification;
use App\Models\Fee;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
/**
 * Class SendFeeReminder
 *
 * Job encargado de enviar un recordatorio por correo electrónico
 * relacionado con una fee (cuota) específica.
 *
 * Se ejecuta de manera asíncrona en la cola de trabajos y utiliza el
 * sistema de notificaciones por correo para avisar al usuario asociado a la fee.
 *
 * @package App\Jobs
 */
class SendFeeReminder implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Fee que se utilizará para enviar la notificación.
     *
     * @var Fee
     */
    public $fee;

    /**
     * Crea una nueva instancia del job.
     *
     * @param Fee $fee La fee sobre la cual se enviará el recordatorio.
     */
    public function __construct(Fee $fee)
    {
        $this->fee = $fee;
    }

    /**
     * Ejecuta el job.
     *
     * Envía un correo electrónico al usuario asociado a la fee
     * utilizando la clase de notificación FeeNotification.
     *
     * @return void
     */
    public function handle(): void
    {
        Mail::to($this->fee->user->email)->send(new FeeNotification($this->fee));
    }
}
