<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вход в админ аккаунт</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans antialiased flex items-center justify-center min-h-screen">
    <div class="w-full max-w-md mx-auto bg-white p-8 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold text-gray-800 text-center mb-6">Вход в админ-аккаунт</h1>
        <form method="POST" action="{{ route('auth.admin.store') }}">
            @csrf
            <div class="mb-4">
                <label for="login" class="block text-gray-700 font-medium mb-2">Логин:</label>
                @error('login')
                    <span class="text-red-500 text-sm block mb-2">{{ $message }}</span>
                @enderror
                <input 
                    type="text" 
                    name="login" 
                    id="login" 
                    placeholder="Введите логин" 
                    class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                >
            </div>
            <div class="mb-6">
                <label for="password" class="block text-gray-700 font-medium mb-2">Пароль:</label>
                @error('password')
                    <span class="text-red-500 text-sm block mb-2">{{ $message }}</span>
                @enderror
                <input 
                    type="password" 
                    name="password" 
                    id="password" 
                    placeholder="Введите пароль администратора" 
                    class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                >
            </div>
            <button 
                type="submit" 
                class="w-full bg-blue-600 text-white p-3 rounded-lg font-medium hover:bg-blue-700 transition duration-200"
            >
                Войти
            </button>
        </form>
    </div>
</body>
</html>