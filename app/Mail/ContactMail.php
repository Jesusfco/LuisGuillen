<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\request;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(request $request)
    {
        return $this->view('mail.contact',[
                            'text'=> $request->text, 
                            'client' => $request->name, 
                            'mail' => $request->mail])
                            ->to('contacto@luisguillen.com.mx', 'Luis Guillen')
                                ->subject('Luis Guillen NUEVO Contacto || ' . $request->name . ' se esta contactando contigo.')
                                ->from($request->mail, $request->name);
                        
                            // ->to('jfcr@live.com');
    }
}
