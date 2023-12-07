<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>@error('image')
    {{ $message }}
    @enderror</h1>
    <h1>Input File</h1>
    <form action="/test/file" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="image">Image: </label>
        <input type="file" name="image" id="image">
        <button type="submit">Submit</button>
    </form>
</body>
</html>
