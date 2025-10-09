<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админ панель</title>
</head>
<script src="https://cdn.tailwindcss.com"></script>
<body>
    <div class="ml-5">
    <div class = "flex">
    <h2 class="mb-2">Админ панель</h2>
    <a href="#" class="ml-5 bg-yellow-300 hover:bg-yellow-500 p-2 rounded">Управление ролями</a>
    </div>

    @foreach($teachers as $teacher)

    <h2 class="mt-2">Учитель - {{ $teacher->name }}</h2> <br>

    <a class="ml-5 mt-2 mb-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" href = "{{ route('adminPanel.show', $teacher->id) }}">подробнее</a>

    @endforeach<br><br><br>

    <a class="mt-10 ml-4 mt-2 mb-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" href = "{{ route('adminPanel.create') }}">Создать учителя</a>
    </div>
</body>
</html>