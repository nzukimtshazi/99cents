@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Upload photo') }}</div>

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">

                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>

                        </div><br>
                    @endif

                    <div class="card-body">
                        <form action="{{ url('photo/store') }}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                            @csrf
                            <div class="avatar-upload col-12">
                                <div class="avatar-edit">
                                    <input type='file' id="image" name="image" onchange="readURL(this);" accept=".png, .jpg, .jpeg" />
                                    <label for="imageUpload"></label>
                                    {{--<img id="blah" src="https://www.tutsmake.com/wp-content/uploads/2019/01/no-image-tut.png" class="" width="200" height="150"/>--}}
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-sm-12 col-md-12">
                                    <div class="col-sm-4 col-md-4">
                                        {{ Form::hidden('user_id', $user_id) }}
                                    </div>
                                </div>
                            </div>
                            <div class="avatar-upload col-6">
                                <button type="submit" class="btn btn-success">Submit</button>
                                <a href="{!!URL::route('photos')!!}" class="btn btn-info" role="button">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function readURL(input, id) {
            id = id || '#blah';
            if (input.files &amp;&amp; input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $(id)
                            .attr('src', e.target.result)
                            .width(200)
                            .height(150);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
