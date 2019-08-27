<!DOCTYPE html>
<!-- app/resources/views/contact/index.blade.php -->

@extends('layout/layout')

<html lang="en">

<!-- Current Users -->

    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-6">
                    <h4>Uploading photos</h4>
                </div>
            </div>

            {{Form::open(['route' => 'photo.store', 'files' => true])}}

            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="col-sm-4 col-md-4">
                        {{ Form::hidden('user_id', $user_id) }}
                    </div>
                </div>
            </div>

            {{Form::label('user_photo', 'User Photo',['class' => 'control-label'])}}
            {{Form::file('user_photo')}}
            {{Form::submit('Save', ['class' => 'btn btn-success'])}}

            {{Form::close()}}
        </div>
    </div>
</html>