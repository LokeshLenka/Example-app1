<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home Page</title>
</head>

<body style="background-color:rgb(48, 50, 51);">
    <h1 style="color:bisque"> This is basic page MR.{{ $id ?? 'Guest'}}

        {{ $called ?? 'Home route not called'}}
    </h1>


</body>

</html>
