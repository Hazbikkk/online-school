<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админ панель</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-blue-100 to-gray-100 flex items-center justify-center min-h-screen py-8">
    <div class="bg-white p-8 rounded-xl shadow-2xl max-w-4xl w-full transform transition-all duration-300 hover:shadow-3xl">
        <!-- Заголовок и навигация -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-8">
            <h2 class="text-3xl font-extrabold text-gray-900">Админ панель</h2>
            <div class="flex flex-col sm:flex-row gap-4 mt-4 sm:mt-0">
                <a href="{{ route('role.index') }}" class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 font-semibold py-2 px-4 rounded-lg transition-colors duration-200">
                    Управление ролями
                </a>
                <a href="{{ route('employee.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition-colors duration-200">
                    Приглосить сотрудника
                </a>
            </div>
        </div>

        <!-- Список учителей -->
        <div class="grid gap-6">
            @foreach($teachers as $teacher)
                <div class="bg-gray-50 p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-200">
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Учитель - {{ $teacher->name }}</h3>
                    <a href="{{ route('adminPanel.show', $teacher->id) }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition-colors duration-200">
                        Подробнее
                    </a>
                </div>
            @endforeach
        </div>

        <!-- Кнопка создания учителя -->
        <div class="mt-8">
            <a href="{{ route('adminPanel.create') }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg transition-colors duration-200">
                Создать учителя
            </a>
            <h4>{{ $teachers->links('vendor.pagination.tailwind')  }}</h4>
        </div>
    </div>
</body>
</html>
