<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Привет, Админ!</h1>
    <h1>Учителя:</h1> <br>
    @foreach($teachers as $teacher)
    <h1>- {{ $teacher }}</h1> <br>
    @endforeach
</body>
</html>