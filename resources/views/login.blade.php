<!doctype html>
<html>
<head>
    <title>Message Board</title>
</head>
<body>
<form action="login" method="POST">
    <table>
        <tr>
            <td>UserName :</td>
            <td><input type="text" name="username"><span style="color: red">{{$errors ->first('username')}}</span></td>
        </tr>
        <tr>
            <td>Password :</td>
            <td><input type="password" name="password"/><span style="color: red">{{$errors ->first('password')}}</span></td>
        </tr>

        <tr>
            <td><input type="submit" value="Login"><br/>
            <td></td>
        </tr>
    </table>
    <span style="color: red"> {{$message}}</span></td>
</form>
</body>
</html>