<!DOCTYPE html>
<!-- app/resources/views/contact/index.blade.php -->

@extends('layout/layout')

<html lang="en">

<!-- Current Users -->

<div class="container">
    <div class="panel-heading">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>99cents</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

        <div class="row">
            <div class="col-xs-6">
                <h4>Photos for : {{ $user->firstname }} {{ $user->surname }}</h4>
            </div>
            <div class="col-xs-12 text-right">

                <a href="{!!URL::route('photo.upload',['user_id' => $user->id])!!}" class="btn btn-edit">Upload Photo</a>
                <a href="{!!URL::route('user.login')!!}" class="btn btn-default">Back</a>
            </div>
        </div>

        <div class="panel-body">
            <table class="table table-striped" id="dataTable">

                @if (count($photos) > 0)
                    <tbody>
                    @foreach ($photos as $photo)
                        {{--<img src="/image/{{ $photo['image'] }}" height="30px" width="30px" />--}}
                        <tr>
                            <td style="text-align:center; margin-top:10px; word-break:break-all; width:450px; line-height:100px;">
                                <?php if($photo['image'] != ""): ?>
                                <img src="{{ URL::asset('/image'.$photo->image) }}" width="100px" height="100px" style="border:1px solid #333333;">
                                <?php else: ?>
                                <img src="images/default.png" width="100px" height="100px" style="border:1px solid #333333;">
                                <?php endif; ?>
                            </td>
                        </tr>
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

                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="col-sm-4 col-md-4">
                            <a href="{!!URL::route('photo.search')!!}" class="btn btn-info" role="button">Search</a>
                        </div>
                    </div>
                </div>
            </table>
        </div>
    </div>
</html>