<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>

<form action="{{  route('login') }}" method="post">
    @csrf
    <div>
        <label for="username">Username : </label>
        <input type="text" name="username" id="username" />
        @error('username') {{ $errors->first('username') }} @enderror
    </div>
    <div>
        <label for="password">Username : </label>
        <input type="password" name="password" id="password" />
    </div>
    <button type="submit">Login</button>
</form>

</body>
</html>
