<?php

namespace App\Mail;

use App\Appraisaluser;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WaitingtobeAppraisedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $appraisaluser;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Appraisaluser $appraisaluser)
    {
        $this->appraisaluser=$appraisaluser;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.waitingtobeappraised')->with([
            'lastname'=>$this->appraisaluser->user->lastname,
            'firstname'=>$this->appraisaluser->user->firstname,
            'staffnumb'=>$this->appraisaluser->user->staffnumb,
            'phone'=>$this->appraisaluser->user->phone,
            'department'=>$this->appraisaluser->user->department->name,
            'appraisaltitle'=>$this->appraisaluser->appraisal->title,
            'submittedon'=>$this->appraisaluser->created_at,
        ]);
    }
}
