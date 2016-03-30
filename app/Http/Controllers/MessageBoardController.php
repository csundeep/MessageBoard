<?php

namespace App\Http\Controllers;

use App\Comments;
use App\Post;

use App\Http\Requests;
use App\User;
use Illuminate\Support\Facades\Input;

class MessageBoardController extends Controller
{
    public function showMessageBoard()
    {
        $post = new Post();
        $posts = $post->get();
        $userName = "";
        return view("messageboard", compact('userName', 'posts'));
    }

    public function postQuery()
    {
        $title = Input::get('title');
        $description = Input::get('description');
        $userName = Input::get('userName');
        $user = User::where('email', $userName)->first();
        $newPost = new post();
        $newPost->post_title = $title;
        $newPost->description = $description;
        $newPost->user_id = $user->id;
        $newPost->save();
        $post = new Post();
        $posts = $post->get();
        return view("messageboard", compact('userName', 'posts'));
    }

    public function showPost($id, $userName = "")
    {
        $post = Post::find($id);
        $comments = Post::find($id)->comments;

        foreach ($comments as $comment) {

            //  echo User::find($comment->user_id)->email;
        }
        return view("post", compact('post', 'comments', 'userName'));
    }

    public function postComment($comment, $userName, $postId)
    {
        $responseString = "<table>";
        $newComment = new Comments();
        $newComment->comment = $comment;
        $newComment->post_id = $postId;
        $newComment->user_id = User::where('email', $userName)->first()->id;
        $newComment->save();

        $comments = new Comments();
        $comments = $comments->get();
        foreach ($comments as $comment) {
            $responseString = $responseString . "<tr>
                <td><textarea>" . $comment->comment . "</textarea> Commented by " . User::find($comment->user_id)->email . "
            Commented date " . $comment->created_at . "</td></tr>";
        }
        $responseString = $responseString . "</table>";

        return $responseString;
    }
}
