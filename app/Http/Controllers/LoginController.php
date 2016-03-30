<?php

namespace App\Http\Controllers;

use App\Comments;
use App\Http\Requests\LoginRequest;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    public function showLogin()
    {
        $message = "";
        return view("login", ['message' => $message]);
    }

    public function doLogout()
    {
        return Redirect::to('login'); // redirect the user to the login screen
    }

    public function doLogin(LoginRequest $request)
    {
        $userName = $request->username;
        $password = $request->password;
        $user = new User();
        $users = $user->get();
        $post = new Post();
        $posts = $post->get();
        foreach ($users as $u) {
            if ($userName == $u->email && $password == $u->password)
                return view("messageboard", compact('userName', 'posts'));
        }
        return view("login", ['message' => "login Failed : username and password does not match"]);
    }

    public function postLogin()
    {
        $userName = Input::get('username');
        $password = Input::get('password');
        $user = new User();
        $users = $user->get();

        $post = Post::find(1);
        $comments = Comments::get();
        foreach ($users as $u) {
            if ($userName == $u->email && $password == $u->password)
                return view("post", compact('post', 'comments', 'userName'));
        }
        return view("login", ['message' => "login Failed"]);
    }
}
