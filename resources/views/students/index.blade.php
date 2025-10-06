<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Админ панель</h2>

    @foreach($students as $student)

    <h2>{{ $student->name }}</h2> <br>

    <a href = "{{ route('students.show', $student->id) }}">подробнее</a>

    @endforeach

    <a href = "{{ route('students.create') }}">Создать учителя</a>

</body>
</html>