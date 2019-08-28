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
        <h2 style="margin-left: -48px;">User Login</h2>
        <br>
        {!! Form::model(['method' => 'GET', 'route' => ['photos']]) !!}

        <div class="form-group">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email Address') }}</label>
            {!! Form::text('email', '', array('class' => 'form-control input-sm')) !!}
        </div><br>

        <div class="form-group">
            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
            {!! Form::password('password', array('class' => 'form-control input-sm', 'placeholder' => 'Password')) !!}
        </div><br>

        {!! Form::submit('Login', array('class' => 'btn btn-info btn-block')) !!}
        <a href="{!!URL::route('user.create')!!}" class="btn btn-info" role="button">Register</a>

        {!! Form::close() !!}
    </div>
</body>
</html>