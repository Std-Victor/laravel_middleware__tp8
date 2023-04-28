<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
</head>
<body>
<h3>Welcome {{ session()->get('username') }} to your Dashboard </h3>
<form action="{{ route('logout') }}" method="post">
    @csrf
    <button type="submit">LogOut</button>
</form>
</body>
</html>
