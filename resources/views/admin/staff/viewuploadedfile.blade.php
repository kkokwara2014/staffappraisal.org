<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>{{$uploadedfile->filename}}</title>

        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="{{asset('admin_assets/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{asset('admin_assets/bower_components/font-awesome/css/font-awesome.min.css')}}">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
            integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

        
    </head>

    <body>
    <div class="container">
    <iframe style="width:1100px; height: 1000px;" src="{{ url('storage/staff_appraisal_documents/'.$uploadedfile->filename) }}"></iframe>
    </div>
        
    </body>

</html>