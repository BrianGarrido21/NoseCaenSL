<?php

namespace App\Http\Controllers;

use App\Mail\FeeNotification;
use App\Models\Fee;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

/**
 * Class PDFController
 *
 * Controlador encargado de gestionar la generación y reenvío de PDFs asociados a fees.
 *
 * @package App\Http\Controllers
 */
class PDFController extends Controller
{
    /**
     * Descarga el PDF de una fee específica.
     *
     * Genera un archivo PDF con los datos de la fee y su usuario asociado,
     * utilizando la vista `pdf.fee`.
     *
     * @param int $id ID de la fee a generar el PDF.
     *
     * @return \Illuminate\Http\Response Descarga del archivo PDF de la fee.
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException Si la fee no existe.
     */
    public function downloadFeePDF($id)
    {
        $fee =  Fee::with('user')->findOrFail($id);
    
        $pdf = FacadePdf::loadView('pdf.fee', compact('fee'))
                  ->setPaper('A4', 'portrait');
    
        return $pdf->download("cuota_{$fee->id}.pdf");
    }
    /**
     * Reenvía el PDF de una fee por correo electrónico al usuario asociado.
     *
     * Envía la notificación por email con los datos de la fee al correo del usuario.
     *
     * @param int $id ID de la fee a reenviar.
     *
     * @return \Illuminate\Http\RedirectResponse Redirección con mensaje de éxito.
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException Si la fee no existe.
     */
    public function resendFeePDF($id)
    {
        $fee =  Fee::with('user')->findOrFail($id);
        Mail::to($fee->user->email)->send(new FeeNotification($fee));

        return redirect()->back()->with('success', 'Email sended successfully');
    }
}
