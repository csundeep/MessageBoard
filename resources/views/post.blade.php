<!doctype html>
<html>
<head>
    <title>Message Board</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            @if($userName=="")
            $("#newComment").val('please login to comment');
            $("#newComment").prop('disabled', true);
            @endif
        $("#comment").click(function () {
                var comment = $("#newComment").val();
                $.ajax({
                    url: "http://localhost/MessageBoard/public/postComment/" + comment,
                    success: function (result) {
                        $("table").empty();
                        $('#newComment').val('');
                        $("#response").html(result);

                    }
                });
            });
        });
    </script>
</head>
<body>

<div>
    <p>Welcome to message board {{$userName}}</p>

    @if($userName=="")
        <a href="login">login</a>
        <a href="register">create a new profile</a>
    @endif

    @if($userName!="")
        <a href="logout">logout</a>
    @endif
</div>

<h1>{{$post->post_title}}</h1>
<p>{{$post->description}}</p>
<table>
    <div id="response">
        @foreach($comments as $comment)
            <tr>
                <td><textarea>{{$comment->comment}}</textarea>
                    Commented by {{App\User::find($comment->user_id)->email}}
                    Commented date {{$comment->created_at}}</td>
            </tr>
        @endforeach
    </div>
</table>

<textarea rows="4" cols="50" name="newComment" id="newComment"></textarea>
<input type="button" value="comment" id="comment">
</body>
</html>