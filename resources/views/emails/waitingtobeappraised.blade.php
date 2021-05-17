@component('mail::message')

Dear <strong>Sir/Madam</strong>, <br>

A staff has submitted appraisal form and it is waiting for scoring. The appraisal 
details are as follows : <br>

<div>
    Staff Name: <strong>{{$firstname.' '.$lastname}}</strong>
</div>
<div>
    Staff Number: <strong>{{ $staffnumb  }}</strong>
</div>
<div>
    Staff Phone: <strong>{{ $phone  }}</strong>
</div>
<div>
    Department: <strong>{{ $department  }}</strong>
</div>
<div>
    Appraisal Title: <strong>{{ $appraisaltitle  }}</strong>
</div>
<div>
    Submitted on: <strong>{{ $submittedon  }}</strong>
</div>
<br>
<br>
Kindly visit <a href="https://www.staffappraisal.org/login">here</a> to login and appraise the staff.
<br><br>
Thank you.
<br>
<br>
Staff Appraisal Team.
@endcomponent
