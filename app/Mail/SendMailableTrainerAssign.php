<?php

namespace App\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Symfony\Component\HttpFoundation\Request;

class SendMailableTrainerAssign extends Mailable
{
    use Queueable, SerializesModels;

    public $value;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($value)
    {
        $this->value = $value;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->to($this->value->email)
                    //->bcc('auth@another.com')
                    ->subject('Your demand training has been approved')
                    ->view('pages.trainer_asssing') ->with([
                        'request' => $this->value->email,
                        'request' => $this->value->name,
                    
                      ]);
    }
}
