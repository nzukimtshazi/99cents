<?php

namespace App\Http\Controllers;

use App\Models\Photo\Photo;
use App\Models\User\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Image;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::where('id', '=', Auth::user()->id)->first();
        $photos = Photo::all();
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
        request()->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($files = $request->file('image')) {
            $destinationPath = 'image/'; // upload path
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);

            $photo = new Photo();
            $photo->user_id = $request->user_id;
            $photo->image = "$profileImage";
        }
        if ($photo->save()) {
            return Redirect::back()->withSuccess('Image has been successfully uploaded.');
        }
    }

    /**
     * Return resources from storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function search()
    {
        $user = User::where('firstname', '=', Input::get('firstname'))
            ->where('surname', '=', Input::get('surname'))->first();
        $photos = Photo::where('user_id', '=', $user->id)->get();
        return view('photo.searchedphotos', compact('user', 'photos'));
    }
}
