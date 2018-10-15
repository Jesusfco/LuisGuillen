<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;
use App\EventsDoubt;

class DoubtNotifyAdminMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $doubt;
    public function __construct(EventsDoubt $doubt){
        $this->doubt = $doubt;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.newDoubt',[
            'doubt '=> $this->doubt 
            ])
            ->to('contacto@luisguillen.mx', 'Notificaciones Luis Guillen Web')
            // ->to('jfcr@live.com', 'JESUS FCO CORTES')
                ->subject('Nueva Pregunta || Evento || ' . $this->doubt->event->name . ' || Luis Guillen')
                ->from('contacto@luisguillen.mx', 'Coach Mental Luis Guillen');
    }
}
