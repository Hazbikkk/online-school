<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админ панель</title>
</head>
<script src="https://cdn.tailwindcss.com"></script>
<body>
    <h2>Ф.И.О. {{ $teacher->name }}</h2>
    <h2>Должность: {{ $teacher->object }}</h2>

    <form method="POST" action = "{{ route('adminPanel.destroy', $teacher->id) }}">
    @csrf
    @method('DELETE')
    <button type="submit" class = "bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Удалить учителя</button>
    </form>
    <a href = "{{ route('adminPanel.edit', $teacher->id) }}" class = "bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Изменить информацию об учителе</a>
</body>
</html>