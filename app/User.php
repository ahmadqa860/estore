<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class User extends Model
{
    static public function validate($email, $password)
    {

        $valid  = false;
        $user = DB::table('users as u')
            ->join('user_permissions as up', 'u.id', '=', 'up.uid')
            ->join('permissions as p', 'p.id', '=', 'up.pid')
            ->where('u.email', '=', $email)
            ->first();

        if ($user) {
            if (Hash::check($password, $user->password)) {
                $valid = true;
                Session::put('user_name', $user->name);
                Session::put('user_id', $user->uid);
                Session::flash('sm', 'You are now logged in');

                if ($user->kind == 'admin') {
                    Session::put('is_admin', true);
                }
            }
        }

        return $valid;
    }

    static public function save_new($request)
    {
        $user = new self();
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->password = bcrypt($request['password']);
        $user->country = $request['country'];
        $user->save();
        DB::table('user_permissions')->insert(
            ['uid' => $user->id, 'pid' => 2]
        );

        Session::put('user_name', $request['name']);
        Session::put('user_id', $user->id);
        Session::flash('sm', 'You are now signin');
    }
}