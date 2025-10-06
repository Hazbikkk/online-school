<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<script src="https://cdn.tailwindcss.com"></script>
<body>
    <form method="POST" action="{{ route('auth.admin.store')}}">
        @csrf
        @error('login')
            <span style="color: red;">{{ $message }}</span>
        @enderror
        <h1 class = "block w-full max-w-md mx-auto">Логин:</h1> <input type="text" placeholder="Введите логин" name = "login" class="block w-full max-w-md mx-auto p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"><br>
        @error('password')
            <span style="color: red;">{{ $message }}</span>
        @enderror
        <h1 class = "block w-full max-w-md mx-auto">Пароль:</h1> <input type="text" placeholder="Введите пароль администратора" name = "password" class="block w-full max-w-md mx-auto p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
        
        <button class=" block w-full max-w-md mx-auto">Войти</button>
    </form>
</body>
</html>