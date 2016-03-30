<!doctype html>
<html>
<head>
    <title>Message Board</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#query").hide();
            $("#PostQuery").click(function () {
                $("#query").slideToggle();
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

<div>
    <h3>Posts</h3>
    <table border="1">
        <tr>
            <th>Post Title</th>
            <th>Posted by</th>
            <th>No of comments</th>
            <th>Posted On</th>
        </tr>
        @foreach($posts as $post)

            <tr>
                @if($userName!="")
                    <td><a href="post/{{$post->id}}/{{$userName}}">{{$post->post_title}}</a></td>
                @endif
                @if($userName=="")
                    <td><a href="post/{{$post->id}}">{{$post->post_title}}</a></td>
                @endif
                <td>{{$post->User['email']}}</td>
                </td>
                <td>{{\App\Comments::where('post_id',$post->id)->count()}}</td>
                <td>{{$post->created_at}}</td>
            </tr>
        @endforeach
    </table>
</div>
<br/>
@if($userName!="")
    <input type="button" id="PostQuery" value="Post Your Query">

    <div id="query">
        <form action="postQuery" method="post">
            <table>
                <tr>
                    <td> Title :</td>
                    <td><input type="text" name="title"></td>
                </tr>
                <tr>
                    <td> Description :</td>
                    <td><textarea rows="4" cols="50" name="description"></textarea></td>
                </tr>
                <tr>
                    <td><input type="submit"/></td>
                    <td></td>
                </tr>
            </table>
            <input type="hidden" value="{{$userName}}" name="userName">
        </form>
    </div>
@endif
{{--@endif--}}
</body>
</html>