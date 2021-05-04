<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewStaffMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user,$generated_password;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, $generated_password)
    {
        $this->user=$user;
        $this->generated_password=$generated_password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.newstaff')->with([
            'lastname'=>$this->user->lastname,
            'firstname'=>$this->user->firstname,
            'staffnumb'=>$this->user->staffnumb,
            'generatedpassword'=>$this->generated_password,
        ]);
    }
}
