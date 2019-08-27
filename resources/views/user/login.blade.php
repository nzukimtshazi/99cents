<!-- app/views/login.blade.php -->

@extends('layout/layout')

<div>{{{ $errors->first('user') }}}</div>

    <div class="row centered-form faded">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Please Login</h3>
                </div>
                <div class="panel-body">
                    {!! Form::model(['method' => 'GET', 'route' => ['photos']]) !!}

                    <div class="form-group">
                        <label for="firstname" class="col-md-4 col-form-label text-md-right">{{ __('Firstname') }}</label>
                        <input type="text" name="firstname">
                    </div><br>

                    <div class="form-group">
                        <label for="surname" class="col-md-4 col-form-label text-md-right">{{ __('Surname') }}</label>
                        <input type="text" name="surname">
                    </div><br>

                    {!! Form::submit('Login', array('class' => 'btn btn-info btn-block')) !!}
                    <a href="{!!URL::route('user.create')!!}" class="btn btn-info" role="button">Register</a>

                    {!! Form::close() !!}
                </div>
            </div>
            <?php /*
        <div class="text-center">
          <a href="/register" >Don't have an account? Register</a>
        </div>
        */ ?>
        </div>
    </div>



