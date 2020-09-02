<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\signinRequest;
use App\Http\Requests\SignupRequest;
use App\User;
use Illuminate\Support\Facades\Session;
use App\Iwatch;

class UserController extends MainController
{

    public function getSignin()
    {
        self::$viewData['page_title'] .= "Signin Page";
        return view('signin', self::$viewData);
    }

    public function postSignin(signinRequest $request)
    {
        if (User::validate($request['email'], $request['password'])) {
            $rn = !empty($request['rn']) ? $request['rn'] : '';
            return redirect($rn);
        } else {
            return view('signin', self::$viewData)->withErrors('Wrong email or password');
        }
    }

    public function logout(Request $request)
    {
        //another way
        //Session::forget(['user_id', 'user_name', 'is_admin']);
        $request->session()->forget(['user_id', 'user_name', 'is_admin']);
        return redirect('user/signin');
    }

    public function getSignup(Request $request)
    {
        self::$viewData['page_title'] .= "Signup Page";
        self::$viewData['countries'] = Iwatch::getCountries();
        self::$viewData['rn'] = !empty($request['rn']) ? '?rn=' . $request['rn'] : '';
        return view('signup', self::$viewData);
    }

    public function postSignup(SignupRequest $request)
    {
        User::save_new($request);
        $rn = !empty($request['rn']) ? $request['rn'] : '';
        return redirect($rn);
    }
}
