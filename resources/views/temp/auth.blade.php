<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @foreach($errors->all() as $error)
        <h1 style="color: red;">
            {{ $error }}
        </h1>
    @endforeach
    @if(Session::has('success'))
        <h1 style="color: green;">{{ Session::get('success') }}</h1>
    @endif
    <h1>LOGIN</h1>
    <form action="/test/auth" method="POST">
        @csrf
        <div>
            <label for="username">Username: </label>
            <input type="text" name="username" id="username">
        </div>
        <div>
            <label for="password">Password: </label>
            <input type="text" name="password" id="password">
        </div>
        <div>
            <button type="submit">Submit</button>
        </div>
    </form>
    <h1>REGISTER</h1>
    <form action="/test/register" method="POST">
        @csrf
        <div>
            <label for="username">Username: </label>
            <input type="text" name="username" id="username" value="{{ old('username') }}">
        </div>
        <div>
            <label for="name">Name: </label>
            <input type="text" name="name" id="name" value="{{ old('name') }}">
        </div>
        <div>
            <label for="email">Email: </label>
            <input type="text" name="email" id="email" value="{{ old('email') }}">
        </div>
        <div>
            <label for="email">Password: </label>
            <input type="text" name="password" id="password">
        </div>
        <div>
            <label for="passwordConfirmation">Password Confirmation: </label>
            <input type="text" name="passwordConfirmation" id="passwordConfirmation">
        </div>
        <div>
            <button type="submit">Submit</button>
        </div>
    </form>
</body>
</html>
