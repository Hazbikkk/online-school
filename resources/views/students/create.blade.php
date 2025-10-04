<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method = "POST" action = "{{ route('students.store') }}">

    @csrf

    Имя: <input name="name"<br>
    @error('name')
                <span style="color: red;">{{ $message }}</span>
    @enderror
    Email: <input name="email" type="email">
    @error('email')
                <span style="color: red;">{{ $message }}</span>
    @enderror

    <button type="submite" value = "создать студента">
    </form>
</body>
</html>