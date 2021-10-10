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
                <h3 style="text-align: center">{{ $report->appraisal->title }} Report</h3>

                <img src="{{url('user_images',$report->user->userimage)}}" width="120" height="120"
                    style="border-radius: 50%; float: right">
                <h4>
                    Staff Name:
                    {{ucfirst($report->user->firstname).' '.($report->user->middlename!=''?ucfirst($report->user->middlename):'').' '.ucfirst($report->user->lastname)}}
                    <br>
                    Staff Number: {{ $report->user->staffnumb }}
                    <br>
                    Phone Number: {{ $report->user->phone }}
                    <br>
                    Category: {{ $report->user->category->name }}
                    <br>
                    Department: {{ $report->user->department->name }}
                </h4>
            </div>
        </div>
        <hr>
        
                <table class="table table-responsive-sm">
                    <thead>
                        <tr>
                            
                            <th>DOB</th>
                            <th>Qualification</th>
                            <th>Assump. Date</th>
                            <th>Confirm. Date</th>
                            <th>Post on Appoint.</th>
                            <th>Presnt Post</th>
                            <th>Last Promotion</th>
                            <th>Perf. Rating</th>
                            <th>HOD Recomm.</th>
                            <th>Sch. Recomm.</th>
                            <th>Mgt. Recomm.</th>
                        </tr>
                    </thead>
                    <tbody>

                        <div>

                            <tr>
                               
                                <td>{{date('d M, Y',strtotime($report->user->dob))}}</td>
                                <td>
                                    @if ($report->user->category_id==2 || $report->user->category_id==3)
                                        @foreach ($qualifications as $qualif)
                                            @if (($qualif->user_id == $report->user_id ))
                                            {{$qualif->qualname.', '.date('Y',strtotime($qualif->dateofgrad)).'; '}}
                                            @endif
                                        @endforeach
                                    @else
                                        @foreach ($juniorqualifications as $qualif)
                                            @if (($qualif->user_id == $report->user_id ))
                                                {{$qualif->qualification.', '.date('Y',strtotime($qualif->dateobtained)).'; '}}
                                            @endif
                                        @endforeach
                                    @endif
                                </td>
                                <td>{{date('d M, Y',strtotime($report->user->assumptiondate))}}</td>
                                <td>
                                    @if ($report->user->confirmationdate==NULL)
                                       <span>None</span> 
                                    @else
                                    {{date('d M, Y',strtotime($report->user->confirmationdate))}}    
                                    @endif
                                </td>
                                <td>{{$report->user->firstassumptionstatus}}</td>
                                <td>{{$report->salaryscale->presentpost}}</td>
                                <td>
                                    @if ($report->promotion_id==NULL)
                                        <span>None</span>
                                    @else
                                    {{$report->promotion->promodate}}
                                    @endif
                                </td>
                                <td><span style="font-size:20px; font-weight:bold;">{{$report->appraisalscore->totalscore}}</span></td>
                                <td>{{ $report->appraisalscore->recommendation!=''? $report->appraisalscore->recommendation:'Nill' }}</td>
                                <td>{{ $report->appraisalscore->schboardrecomm!=''? $report->appraisalscore->schboardrecomm :'Nill' }}</td>
                                <td>{{ $report->appraisalscore->managementrecomm!=''? $report->appraisalscore->managementrecomm:'Nill' }}</td>
                            </tr>

                        </div>

                    </tbody>
                </table>
    </body>

</html>