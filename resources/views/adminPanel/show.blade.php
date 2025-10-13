<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админ панель - Учитель</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-blue-100 to-gray-100 flex items-center justify-center min-h-screen py-8">
    <div class="bg-white p-8 rounded-xl shadow-2xl max-w-lg w-full transform transition-all duration-300 hover:shadow-3xl">
        <!-- Информация об учителе -->
        <h2 class="text-2xl font-extrabold text-gray-900 mb-4">Ф.И.О.: {{ $teacher->name }}</h2>
        <h3 class="text-xl font-semibold text-gray-700 mb-6">Должность: {{ $teacher->object }}</h3>

        <!-- Форма удаления -->
        <form method="POST" action="{{ route('adminPanel.destroy', $teacher->id) }}" class="mb-4">
            @csrf
            @method('DELETE')
            <button type="submit" class="w-full bg-red-500 hover:bg-red-700 text-white font-semibold py-3 px-4 rounded-lg transition-colors duration-200">
                Удалить учителя
            </button>
        </form>

        <!-- Ссылка для редактирования -->
        <a href="{{ route('adminPanel.edit', $teacher->id) }}" class="block w-full bg-green-500 hover:bg-green-700 text-white font-semibold py-3 px-4 rounded-lg text-center transition-colors duration-200">
            Изменить информацию об учителе
        </a>
    </div>
</body>
</html>