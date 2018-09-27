<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;

class ResetMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.resetPassword',[
            // 'token'=> $data->token, 
            'token'=> $this->data->token, 
            ])
            // ->to('ve@amerigas.mx', 'Rodriguez Services')
            ->to($this->data->email, $this->data->name)
                ->subject('Resetea tu contraseña')
                ->from('reset@luisguillen.mx', 'Luis Guillen Reset Password');
    }
}
