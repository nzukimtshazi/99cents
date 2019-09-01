<?php

namespace App\Http\Controllers;

use App\Models\User\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use \Validator;
use Session;
use Illuminate\Support\Facades\Routes;


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
        $user->firstname = Input::get('firstname');
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
        $users = User::where('email', '=', Input::get('email'))->get();

        //check if email address exists
        if ($users -> isEmpty()) {
            $message = 'Sorry, email address does not exist';
            return Redirect::to('login')
                ->withInput(Input::except('password'))// send back the input (not the password) so that we can repopulate the form
                ->withErrors(array('email' => $message));
        }

        foreach ($users as $user) {
            $rules = array(
                'email' => 'required|email', // make sure the email is an actual email
                'password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
            );

            // run the validation rules on the inputs from the form
            $validator = Validator::make(Input::all(), $rules);

            // if the validator fails, redirect back to the form
            if ($validator->fails()) {
                $message = 'Your login failed. Please try again.';
                return Redirect::to('login')
                    ->withInput(Input::except('password'))// send back the input (not the password) so that we can repopulate the form
                    ->withErrors(array('email' => $message));
            } else {

                // create our user data for the authentication
                $userdata = array(
                    'email' => Input::get('email'),
                    'password' => Input::get('password')
                );

                // attempt to do the login
                if (Auth::attempt($userdata, true)) {
                    $user_id = $user->id;
                    return Redirect::route('photos', ['user_id' => $user_id]);
                } else {

                    // validation not successful, send back to form
                    $message = 'Your login failed. Please try again.';
                    return Redirect::to('login')
                        ->withInput(Input::except('password'))// send back the input (not the password) so that we can repopulate the form
                        ->withErrors(array('email' => $message));
                }
            }
        }
    }
    /**
     * Search a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function search()
    {
        return view('photo.search');
    }
}
