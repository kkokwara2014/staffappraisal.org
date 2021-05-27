<?php

namespace App\Mail;

use App\Appraisalscore;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AppraisalScoreMail extends Mailable
{
    use Queueable, SerializesModels;

    public $appraisedstaff, $appraisalscore;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Appraisalscore $appraisalscore, User $appraisedstaff)
    {
        $this->appraisalscore=$appraisalscore;
        $this->appraisedstaff=$appraisedstaff;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.appraisal_score_mail')->with([
            'lastname'=>$this->appraisedstaff->lastname,
            'firstname'=>$this->appraisedstaff->firstname,
            'staffnumb'=>$this->appraisedstaff->staffnumb,
            'department'=>$this->appraisedstaff->department->name,
            'appraisaltitle'=>$this->appraisalscore->appraisal->title,
            'scored_on'=>$this->appraisalscore->created_at,
        ]);
    }
}
