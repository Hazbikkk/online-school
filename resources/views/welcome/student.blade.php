<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online-School</title>
</head>
<body>
    <nav>
    <a href="{{ route('objects.math') }}">Математика</a>
    <a href="{{ route('objects.physics') }}">Физика</a>
    <a href="{{ route('objects.russian') }}">Русский</a>
    <a href="{{ route('objects.geography') }}">География</a>
    </nav>
    <h1>Приветствуем {{ $name }}! Нажми по ссылкам выше чтобы пройти курс по предмету</h1><br>
    <h2>За каждый пройденный урок на нашем портале тебе будут выдаваться баллы знаний!</h2>
</body>
</html>