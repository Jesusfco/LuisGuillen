<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;
use App\EventsDoubt;

class DoubtAnswerMail extends Mailable
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
        return $this->view('mail.answerDoubt',[
            'doubt '=> $this->doubt 
            ])
            ->to($this->doubt->user->email, $this->doubt->user->name)
            // ->to('jfcr@live.com', 'JESUS FCO CORTES')
                ->subject('Luis Guillen respondio su pregunta del evento')
                ->from('contacto@luisguillen.mx', 'Coach Mental Luis Guillen');
    }
}

