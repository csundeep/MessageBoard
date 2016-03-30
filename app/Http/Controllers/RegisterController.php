<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;

use App\Http\Requests;

class RegisterController extends Controller
{
    public function showRegistration()
    {
        $message = "";
        return view("register", compact('message'));
    }

    public function doRegistration(Requests\RegistrationRequest $request)
    {
        $user = new User();
        $user->first_name = $request->firstName;
        $user->last_name = $request->lastName;
        $user->email = $request->email;
        $user->password = $request->password;

        $post = new Post();
        $posts = $post->get();

        if ($request->conpassword != $user->password) {
            $message = "passwords not matched";
            return view("register", compact('message'));
        } else {
            //$user->save();
            $userName = $user->email;
            return view("messageboard", compact('userName', 'posts'));
        }
    }
}
