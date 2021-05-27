@component('mail::message')

Dear <strong>{{$firstname.' '.$lastname}} - [{{ $staffnumb  }}]</strong>, <br>

Your appraisal has been scored by your Appraiser. The details of the scored appraisal include: <br>

<div>
    Appraisal Title: {{ $appraisaltitle }}
</div>
<div>
    Date scored: {{ $scored_on }}
</div>

<br><br>
Kindly login via www.staffappraisal.org/login to check your score. Thank you.
<br>
<br>
Staff Appraisal Team.
@endcomponent

