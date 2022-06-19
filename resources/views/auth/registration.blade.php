<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Custom Authentication</title>
    
</head>
<body>
    <form action="{{route('register-student')}}" method="post">
        @if(Session::has('success'))
        <div>{{Session::get('success')}}</div>
         @endif
        @if(Session::has('error'))
        <div>{{Session::get('error')}}</div>
        @endif
        @csrf
        Name:<input type="text" placeholder="Name" name="name" value="{{old('name')}}"><br>
        
        @error('name')
        {{$message}}
        @enderror
        <br>
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

        <input type="submit" value="Registration">
        <a href="login">Already Registered</a>
    </form>
</body>

</html>