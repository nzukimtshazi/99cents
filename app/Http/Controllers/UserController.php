<?php

namespace App\Http\Controllers;

use App\Models\User\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = Input::all();
        $user = new User($input);
        $user->password = Hash::make(Input::get('password'));

        $exists = User::where('email', $user->email)->first();
        if ($exists) {
            $message = 'User already exists, please login!';
            return Redirect::back()->withInput()->withErrors(array('email' => $message));
        }

        $result = filter_var( $user->email, FILTER_VALIDATE_EMAIL );

        if ($user->save()) {
            $message = 'Successfully added user!';
            return Redirect::back()->withInput()->withErrors(array('email' => $message));
        }
    }

    public function showLogin()
    {
        // show the form
        return view('user.login');
    }

    public function doLogin()
    {
        //dd('I am here');
        $user = User::where('email', '=', Input::get('email'))->first();

        //check if email address exists
        if (!$user) {
            $message = "Email address does not exist on user's table, please register";
            return Redirect::back()->withInput()->withErrors(array('email' => $message));
        } else {
            $user_id = $user->id;
            return Redirect::route('photos', ['user_id' => $user_id]);
        }
    }
}
