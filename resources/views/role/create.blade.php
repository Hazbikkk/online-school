<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Создать роль</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="container mx-auto p-6 bg-white rounded-lg shadow-lg max-w-md">
        <!-- Заголовок -->
        <h1 class="text-2xl font-bold text-gray-800 mb-6 text-center">Создать новую роль</h1>

        <!-- Форма -->
        <form method="POST" action="{{ route('role.store') }}">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-medium mb-2">Имя роли</label>
                <input type="text" id="name" name="name" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="{{ old('name') }}" required>
                @error('name')
                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="w-full px-4 py-2 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
                Создать
            </button>
        </form>

        <!-- Ссылка назад -->
        <div class="mt-4 text-center">
            <a href="{{ route('role.index') }}" class="text-blue-600 hover:underline">Назад к списку ролей</a>
        </div>

        <!-- Сообщение об успехе (если есть) -->
        @if(session('success'))
            <div class="mt-4 p-4 bg-green-100 text-green-700 rounded-md">
                {{ session('success') }}
            </div>
        @endif
    </div>
</body>
</html>