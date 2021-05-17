@component('mail::message')

Dear <strong>{{$firstname.' '.$lastname}} - [{{ $staffnumb  }}]</strong>, <br>
Thank you for submitting your appraisal form. The details of the form include: <br>

<div>
    Appraisal Title: {{ $appraisaltitle }}
</div>
<div>
    Date submitted: {{ $submittedon }}
</div>

<br><br>
Your Appraiser has been notified and you shall be notified also when your appraisal form is scored. Thank you.
<br>
<br>
Staff Appraisal Team.
@endcomponent

