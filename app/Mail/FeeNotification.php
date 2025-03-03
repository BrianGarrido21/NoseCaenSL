<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Barryvdh\DomPDF\Facade\PDF;
use App\Models\Fee;

/**
 * Class FeeNotification
 *
 * Mailable encargado de enviar una notificación por correo electrónico
 * al usuario relacionado con una fee (cuota).
 *
 * Adjunta un archivo PDF generado dinámicamente con los detalles de la fee.
 *
 * @package App\Mail
 */
class FeeNotification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Fee asociada al correo.
     *
     * @var Fee
     */
    public $fee;

    /**
     * Crea una nueva instancia del mailable.
     *
     * @param Fee $fee La fee sobre la cual se genera la notificación.
     */
    public function __construct(Fee $fee)
    {
        $this->fee = $fee;
    }

    /**
     * Construye el correo electrónico.
     *
     * Genera un PDF con los datos de la fee, lo adjunta al correo
     * y utiliza la vista 'mail.fee_notification' como cuerpo del mensaje.
     *
     * @return $this Instancia del correo con los datos configurados.
     */
    public function build()
    {
        $pdf = PDF::loadView('pdf.fee', ['fee' => $this->fee]);

        return $this->from(config('mail.from.address'))
                    ->subject('Notificación de Cuota')
                    ->view('mail.fee_notification')
                    ->with(['fee' => $this->fee])
                    ->attachData($pdf->output(), "cuota_{$this->fee->id}.pdf", [
                        'mime' => 'application/pdf',
                    ]);
    }
}
