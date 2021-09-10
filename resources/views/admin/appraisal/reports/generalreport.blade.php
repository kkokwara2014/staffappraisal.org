<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Print Report</title>

        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="{{asset('admin_assets/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{asset('admin_assets/bower_components/font-awesome/css/font-awesome.min.css')}}">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
            integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

        <style>
            table {
                width: 100%;
                margin: 0px;
            }

            th,
            td {
                width: auto;
                text-align: left;
            }

        </style>

    </head>

    <body>

        <div class="row">
            <div class="col-md-12">
                <h3 style="text-align: center">Staff Appraisal {{ $appraisal->appraisalyear }} Report</h3>
            </div>
        </div>
                
                <table class="table table-responsive-sm">
                    <thead>
                        <tr>
                            <th>Staff Name</th>
                            <th>DOB</th>
                            <th>Qualification</th>
                            <th>Assump. Date</th>
                            <th>Confirm. Date</th>
                            <th>Post on Appt.</th>
                            <th>Present Post</th>
                            <th>Perf. Rating</th>
                            <th>HOD Recom.</th>
                            <th>Div. Comm. Recom.</th>
                            <th>Mgt. Recom.</th>
                            <th>SSA & PC Recom.</th>
                            <th>Expd. Mgt. Recom.</th>
                           
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($appraisalreports as $rpt)
                        <tr>
                            <td>{{$rpt->user->title->title.' '.$rpt->user->firstname.' '.$rpt->user->lastname}}</td>
                            <td>{{$rpt->user->dob}}</td>
                            <td>{{$rpt->qualification->qualname.', '.date('Y',strtotime($rpt->qualification->dateofgrad))}}
                            </td>
                            <td>{{$rpt->user->assumptiondate}}</td>
                            <td>
                                @if ($rpt->user->confirmationdate==NULL)
                                    <span>None</span>
                                @else
                                    {{$rpt->user->confirmationdate}}
                                @endif
                            </td>
                            <td>{{$rpt->user->firstassumptionstatus}}</td>                                    
                            <td>{{$rpt->salaryscale->presentpost}}</td>                                    
                            <td>
                                @if ($rpt->appraisalscore->totalscore>=50)
                                <span class="badge badge-pill badge-success"
                                style="color:white;background:green;">{{ $rpt->appraisalscore->totalscore }}</span>
                                @else
                                <span class="badge badge-pill badge-success"
                                style="color:white;background:red;">{{ $rpt->appraisalscore->totalscore }}</span>
                                @endif
                            </td>
                            <td>{{ $rpt->appraisalscore->recommendation }}</td>                                    
                            <td>Nil</td>                                    
                            <td>Nil</td>                                    
                            <td>Nil</td>                                    
                            <td>Nil</td>                                    

                        </tr>

                        @endforeach

                    </tbody>
                    
                </table>
    </body>

</html>