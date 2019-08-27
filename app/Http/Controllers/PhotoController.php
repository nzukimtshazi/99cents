<?php

namespace App\Http\Controllers;

use App\Models\Photo\Photo;
use App\Models\User\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Image;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = User::where('id', '=', $request->user_id)->first();
        $photos = Photo::where('user_id', '=', $user)->get();
        return view('photo.index', compact('photos', 'user'));
    }

    public function upload(Request $request)
    {
        $user_id = $request->user_id;
        return view('photo.upload', compact('user_id'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $photo = new Photo();
        $photo->user_id = $request->user_id;
        $cnt = $photo->photo_ref;
        $cnt = $cnt + 1;
        $photo->photo_ref = $cnt;
        $photo->photo = $request->file('user_photo');

        if ($photo->save()) {
            $message = 'Successfully added photo!';
            return Redirect::back()->withInput()->withErrors(array('user' => $message));
        }
    }
}
