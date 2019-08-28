<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>99cents</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

    <style>
        .container{
            padding: 5%;
            text-align: left;
        }

    </style>
</head>
<body>

<div>{{{ $errors->first('email') }}}</div>

<div class="container">
    <h3 style="margin-left: -48px;">Create New User</h3>
    <br>
    {!! Form::model(new App\Models\User\User, ['route' => ['user.store']]) !!}

    <div class="form-group">
        {!! Form::label('firstname', 'Firstname') !!}
        {!! Form::text('firstname', Request::old('firstname'), array('class' => 'form-control', 'required')) !!}
    </div><br>

    <div class="form-group">
        {!! Form::label('surname', 'Surname') !!}
        {!! Form::text('surname', Request::old('surname'), array('class' => 'form-control', 'required')) !!}
    </div><br>

    <div class="form-group">
        {!! Form::label('email', 'Email') !!}
        {!! Form::email('email', Request::old('email'), array('class' => 'form-control', 'required')) !!}
    </div><br>

    <div class="form-group">
        {!! Form::label('password', 'Password') !!}
        {!! Form::text('password', Request::old('password'), array('class' => 'form-control', 'required')) !!}
    </div><br>

    <a href="{!!URL::route('user.login')!!}" class="btn btn-info" role="button">Cancel</a>
    {!! Form::submit('Create', array('class' => 'btn btn-primary')) !!}


    {!! Form::close() !!}
</div>
</body>
</html>