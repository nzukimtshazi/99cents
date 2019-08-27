<!DOCTYPE html>
<!-- app/resources/views/contact/index.blade.php -->

@extends('layout/layout')

<html lang="en">

<!-- Current Users -->

<div class="panel panel-default">
    <div class="panel-heading">
        <div class="row">
            <div class="col-xs-6">
                <h4>Photos for : {{ $user->firstname }} {{ $user->surname }}</h4>
            </div>
            <div class="col-xs-6 text-right">

                <a href="{!!URL::route('photo.upload',['user_id' => $user->id])!!}" class="btn btn-warning">Upload Photo</a>
                <a href="{!!URL::route('user.login')!!}" class="btn btn-default">Back</a>
            </div>
        </div>

        <div class="panel-body">
            <table class="table table-striped" id="dataTable">

                @if (count($photos) > 0)
                    <tbody>
                    @foreach ($photos as $photo)
                        {{ $photos->photo }}
                    @endforeach
                    </tbody>
                @else
                    <div class="alert alert-info" role="alert">No photos have been uploaded</div>
                @endif
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="col-sm-4 col-md-4">
                            {{ Form::hidden('user_id', $user->id) }}
                        </div>
                    </div>
                </div>
            </table>
        </div>
    </div>
</html>