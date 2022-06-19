<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{route('login-student')}}" method="post">
        @if(Session::has('fail'))
        <div>{{Session::get('fail')}}</div>
        @endif
        @csrf
        Email:<input type="text" placeholder="Email" name="email" value="{{old('email')}}"><br>
        @error('email')
        {{$message}}
        @enderror
        <br>
        Password:<input type="password" placeholder="Password" name="password" value=""><br>
        @error('password')
        {{$message}}
        @enderror
        <br>
        <input type="submit" value="Login">
        <a href="registration">New User</a>
    </form>
       
</body>
</html>