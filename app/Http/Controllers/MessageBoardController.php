<?php

namespace App\Http\Controllers;

use App\Comments;
use App\Post;

use App\Http\Requests;
use App\User;
use Illuminate\Http\Request;

class MessageBoardController extends Controller
{
    public function showMessageBoard()
    {
        $post = new Post();
        $posts = $post->get();
        return view("messageboard", compact('posts'));
    }

    public function postQuery(Request $request)
    {
        $userName = $request->session()->get('userName');
        $title = $request->title;
        $description = $request->description;
        $user = User::where('email', $userName)->first();
        $newPost = new post();
        $newPost->post_title = $title;
        $newPost->description = $description;
        $newPost->user_id = $user->id;
        $newPost->save();
        $post = new Post();
        $posts = $post->get();
        return view("messageboard", compact('posts'));
    }

    public function showPost($id, Request $request)
    {
        $post = Post::find($id);
        $comments = Post::find($id)->comments;
        $request->session()->set('postId', $id);
        return view("post", compact('post', 'comments'));
    }

    public function postComment($comment, Request $request)
    {
        $postId = $request->session()->get('postId');
        $userName = $request->session()->get('userName');
        $responseString = "<table>";
        if ($comment != null || $comment != "") {
            $newComment = new Comments();
            $newComment->comment = $comment;
            $newComment->post_id = $postId;
            $newComment->user_id = User::where('email', $userName)->first()->id;
            $newComment->save();
        }
        $comments = Post::find($postId)->comments;
        foreach ($comments as $comment) {
            $responseString = $responseString . "<tr>
                <td><textarea>" . $comment->comment . "</textarea> Commented by " . User::find($comment->user_id)->email . "
            Commented date " . $comment->created_at . "</td></tr>";
        }
        $responseString = $responseString . "</table>";

        return $responseString;
    }
}
