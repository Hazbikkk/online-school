<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<script src="https://cdn.tailwindcss.com"></script>
<body>
    <a class = "fixed top-4 right-4 z-[1000] inline-block px-5 py-2.5 bg-blue-600 text-white rounded-md text-base hover:bg-blue-800 transition-colors sm:px-4 sm:py-2 sm:text-sm" href = "{{ route('registration.students') }}">Получили код доступа?(нажми на меня)</a>
    <form method = "POST" action = "{{ route('auth.user.store') }}">
        @csrf
        @error('name')
        <span class="block w-full max-w-md mx-auto" style="color: red;">{{ $message }}</span>
        @enderror
    <h1 class = "block w-full max-w-md mx-auto">Имя:</h1> <input class = "block w-full max-w-md mx-auto p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" id="name" name="name" placeholder="Введите ваше ФИО">
    @error('email')
    <span class="block w-full max-w-md mx-auto" style="color: red;">{{ $message }}</span>
    @enderror
    <h1 class = "block w-full max-w-md mx-auto">Почта:</h1> <input class = "block w-full max-w-md mx-auto p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" id="email" name="email" placeholder="Введите вашу эл. почту">
    
    <button class="mt-4 px-5 py-2.5 bg-blue-600 text-white rounded-md text-base hover:bg-blue-800 transition-colors sm:px-4 sm:py-2 sm:text-sm block w-full max-w-md mx-auto">Войти</button>
    </form>
</body>
</html>