@extends('layouts.app')

@section('content')
    <style>
        img {
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 5px;
            width: 150px;
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <img src="{{ asset('image/' . $photo->image) }}" width="500px" height="500px" style="border:1px solid #333333;">

                </div>
            </div>
        </div>
    </div>
@endsection
