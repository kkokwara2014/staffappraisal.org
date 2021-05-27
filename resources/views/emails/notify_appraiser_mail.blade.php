@component('mail::message')

Dear <strong>Sir/Madam</strong>, <br>

<strong>{{$appraisedstaff_title.' '.$firstname.' '.$lastname}} - [{{ $staffnumb  }}]</strong> of {{ $department }} has commented and submitted <strong>{{ $appraisaltitle }}</strong> on <strong>{{ $commented_on }}</strong>.

<br><br>
Kindly login via www.staffappraisal.org/login to make final submission on the appraisal. Thank you.
<br>
<br>
Staff Appraisal Team.
@endcomponent
