<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Symfony\Component\HttpFoundation\Request;

class SendMailableSuccessEmail extends Mailable
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
        return $this->to($this->request->email)
                    //->bcc('auth@another.com')
                    ->subject('Mail From SIPEAA')
                    ->view('pages.success_mail_send')->with([
                        'request' => $this->$request->name,
                        'request' => $this->$request->email,
                    ]);
    }
}
