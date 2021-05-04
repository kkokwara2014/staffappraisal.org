@component('mail::message')

Dear <strong>{{$firstname.' '.$lastname}}</strong>, <br>
your Staff Appraisal login details are {{ $staffnumb  }} and {{ $generatedpassword }} as Staff number and password respectively.
<br><br>
You may visit <a href="https://www.staffappraisal.org/login">here</a> to login and update your details.
<br><br>
Thank you for your support.
<br>
<br>
Staff Appraisal Team.
@endcomponent
