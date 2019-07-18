<?php

namespace App\Mail;



use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Symfony\Component\HttpFoundation\Request;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $request;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->to('admin@sipeaa.org')
                    //->bcc('auth@another.com')
                    ->subject('Message from contact page')
                    ->view('pages.Contact_email') ->with([
                        'request' => $this->request->email,
                        'request' => $this->request->name,
                        'request' => $this->request->phone,
                        'request' => $this->request->message,
                        
                      ]);
    }
}
