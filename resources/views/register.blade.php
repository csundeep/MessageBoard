<!doctype html>
<html>
<head>
    <title>Message Board</title>
</head>
<body>
<form action="register" method="POST">
    <table>
        <tr>
        <tr>
            <td> First Name :<span style="color: red">*</span></td>
            <td><input type="text" name="firstName"><span style="color: red">{{$errors ->first('firstName')}}</span></td>
        </tr>
        <tr>
            <td>Last Name :<span style="color: red">*</span></td>
            <td><input type="text" name="lastName"><span style="color: red">{{$errors ->first('lastName')}}</span></td>
        </tr>
        <tr>
            <td>Email :<span style="color: red">*</span></td>
            <td><input type="text" name="email"><span style="color: red">{{$errors ->first('email')}}</span></td>
        </tr>
        <tr>
            <td>Password : <span style="color: red">*</span></td>
            <td><input type="password" name="password"/><span style="color: red">{{$errors ->first('password')}}</span></td>
        </tr>
        <tr>
            <td>Confirm password :</td>
            <td><input type="password" name="conpassword"/>
                <span style="color: red">{{$message}}</span></td>
        </tr>
        <tr>
            <td> <input type="submit" value="SignUp"><br/></td>
            <td></td>
        </tr>
    </table>
</form>
</body>
</html>