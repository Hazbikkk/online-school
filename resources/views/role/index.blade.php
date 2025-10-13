<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Роли</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="container mx-auto p-6 bg-white rounded-lg shadow-lg max-w-3xl">
        <!-- Заголовок -->
        <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">{{ $title }}</h1>

        <!-- Список ролей -->
        <h2 class="text-xl font-semibold text-gray-700 mb-4">Все роли:</h2>
        @if($roles->isEmpty())
            <p class="text-gray-500 italic">Ролей пока нет.</p>
        @else
            <div class="space-y-4">
                @foreach($roles as $role)
                    <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg shadow-sm hover:bg-gray-100 transition">
                        <h3 class="text-lg font-medium text-gray-800">Название роли: {{ $role->name }}</h3>
                        <form method="POST" action="{{ route('role.destroy', $role->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 transition">
                                Удалить
                            </button>
                        </form>
                    </div>
                @endforeach
            </div>
        @endif

        <!-- Ссылка для создания роли -->
        <div class="mt-6 text-center">
            <a href="{{ route('role.create') }}" class="inline-block px-6 py-3 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
                Создать роль
            </a>
        </div>

        <!-- Отображение сообщений об успехе или ошибке -->
        @if(session('success'))
            <div class="mt-4 p-4 bg-green-100 text-green-700 rounded-md">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="mt-4 p-4 bg-red-100 text-red-700 rounded-md">
                {{ session('error') }}
            </div>
        @endif
    </div>
</body>
</html>