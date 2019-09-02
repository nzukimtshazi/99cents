@extends('layouts.app')

@section('content')
    <style>
        img {
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 5px;
            width: 150px;
        }

        img:hover {
            box-shadow: 0 0 2px 1px rgba(0, 140, 186, 0.5);
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Uploaded photos') }}</div>

                    <div class="col-xs-12 text-right">
                        <a href="{!!URL::route('photo.upload',['user_id' => $user->id])!!}" class="btn btn-edit">Upload Photo</a>
                        <a href="{!!URL::route('user.search')!!}" class="btn btn-info" role="button">Search</a>
                        <a href="{!!URL::route('user.login')!!}" class="btn btn-default">Back</a>
                    </div>

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">

                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>

                        </div><br>
                    @endif

                    <div class="card-body">
                        <table class="table table-striped" id="dataTable">

                            @if (count($photos) > 0)
                                <tbody>
                                    <?php
                                    $count = 0;
                                    ?>
                                    @foreach ($photos as $photo)
                                        <?php
                                        if($count == 5)
                                        {
                                            print "</tr>";
                                            $count = 0;
                                        }
                                        if ($count == 0)
                                        {
                                            print "<tr>";
                                            print "<td>";
                                        }
                                        ?>
                                        <a target="_blank" href="{!! URL::route('image.thumbnail',[$photo->id]) !!}">
                                            <img src="{{ asset('image/' . $photo->image) }}" width="100px" height="100px" style="border:1px solid #333333;">
                                        </a>
                                        <?php
                                        $count++;
                                        print "</td>";
                                        ?>
                                    @endforeach
                                    <?php
                                    if ($count > 0)
                                        print "</tr>";
                                    ?>
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
            </div>
        </div>
    </div>
@endsection
