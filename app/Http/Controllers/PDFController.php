<?php

namespace App\Http\Controllers;

use App\Mail\AppointmentConfirmation;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

trait PDFController
{
    //
    public function generateAppointmentReport($data) {
        // create pdf from view
        $pdf = Pdf::loadView('appointment.report', $data);

        // view pdf online
        // return $pdf->stream('report.pdf');

        // download pdf
        // return $pdf->download('report.pdf');
        $this->attachAndSendEmail($pdf->output(), $data);
    }

    public function attachAndSendEmail($pdf, $data){
        $mail = new AppointmentConfirmation($pdf, $data['appointment']);
        Mail::to($data['appointment']->user->email)->send($mail);
    }

}
