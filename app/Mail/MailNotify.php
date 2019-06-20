<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Symfony\Component\HttpFoundation\Request;

class MailNotify extends Mailable
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
        return $this->to('admin@sipeaa.com')
                    //->bcc('auth@another.com')
                    ->subject('Somenone is demanding a Training')
                    ->view('pages.email_training_demand') ->with([
                        'request' => $this->request->training_need,
                        'request' => $this->request->form_date,
                        'request' => $this->request->description,
               
                      ]);
    }
}
