<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Page1</title>
</head>

<body style="background-color:rgb(48, 50, 51);">
    <h1 style="color:bisque"> This is page 1 MR.{{ $id ?? 'Guest' }}

        {{ $called ?? 'Basic route not called' }}
        <a href="{{ route('page2') }}">Return to Page2</a>
    </h1>


</body>

</html>
