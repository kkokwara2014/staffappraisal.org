@component('mail::message')

Dear <strong>{{$firstname.' '.$lastname}} - [{{ $staffnumb  }}]</strong>, <br>

You have submitted your comment on your score. The details of the scored appraisal include: <br>

<div>
    Appraisal Title: {{ $appraisaltitle }}
</div>
<div>
    Your comment: 
    <p style="text-align: justify">
        {{ $staffcomment }}
    </p>
</div>
<div>
    Date commented: {{ $submitted_on }}
</div>

<br><br>
Kindly login via www.staffappraisal.org/login to manage your appraisal. Thank you.
<br>
<br>
Staff Appraisal Team.
@endcomponent


