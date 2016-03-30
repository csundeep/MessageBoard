<?php

namespace App\Http\Controllers;


use App\Http\Requests\LoginRequest;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    public function showLogin()
    {
        $message = "";
        return view("login", ['message' => $message]);
    }

    public function doLogout(Request $request)
    {
        $request->session()->flush();
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
            if ($userName == $u->email && $password == $u->password) {
                $request->session()->put('userName', $userName);
                return view("messageboard", compact('posts'));
            }
        }
        return view("login", ['message' => "login Failed : username and password does not match"]);
    }

    public function postLogin(LoginRequest $request)
    {
        $postid = $request->session()->get('postId');
        $userName = $request->username;
        $password = $request->password;
        $user = new User();
        $users = $user->get();
        $post = Post::find($postid);
        $comments = $post->find($postid)->comments;
        foreach ($users as $u) {
            if ($userName == $u->email && $password == $u->password) {
                $request->session()->put('userName', $userName);
                return view("post", compact('post', 'comments'));
            }
        }
        return view("login", ['message' => "login Failed"]);
    }
}
