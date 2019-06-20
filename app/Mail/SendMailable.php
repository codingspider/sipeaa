<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Symfony\Component\HttpFoundation\Request;

class SendMailable extends Mailable
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
                    ->subject('Your Order has been succesfull')
                    ->view('pages.email') ->with([
                        'request' => $this->request->email,
                        'request' => $this->request->first_name,
                        'request' => $this->request->last_name,
                        'request' => $this->request->company,
                        'request' => $this->request->phone,
                        'request' => $this->request->address,
                        'request' => $this->request->total,
                        'request' => $this->request->course_name,
                      ]);
    }
}
