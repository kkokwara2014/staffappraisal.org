<?php

namespace App\Mail;

use App\Appraisalscore;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AppraisalScoreAcceptedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $acceptofrejectcomment,$appraisedstaff;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Appraisalscore $acceptofrejectcomment, User $appraisedstaff)
    {
        $this->acceptofrejectcomment=$acceptofrejectcomment;
        $this->appraisedstaff=$appraisedstaff;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.appraisal_score_accepted_mail')->with([
            'lastname'=>$this->appraisedstaff->lastname,
            'firstname'=>$this->appraisedstaff->firstname,
            'staffnumb'=>$this->appraisedstaff->staffnumb,
            'department'=>$this->appraisedstaff->department->name,
            'appraisaltitle'=>$this->acceptofrejectcomment->appraisal->title,
            'staffcomment'=>$this->acceptofrejectcomment->acceptorrejectcomment,
            'submitted_on'=>$this->acceptofrejectcomment->created_at,
        ]);
    }
}
