<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вход в аккаунт</title>
</head>
<body>
    <script src="https://cdn.tailwindcss.com"></script>
    <form method="POST" action = "{{ route('register.students.store') }}">
        @csrf
        @error('code')
        <span style="color: red;">{{ $message }}</span>
        @enderror
        <h1 class="block w-full max-w-md mx-auto">Код доступа:</h1> <input class="block w-full max-w-md mx-auto p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" id="code" name="code" type="text" placeholder="Код">
        <button class="mt-4 px-5 py-2.5 bg-blue-600 text-white rounded-md text-base hover:bg-blue-800 transition-colors sm:px-4 sm:py-2 sm:text-sm block w-full max-w-md mx-auto">Продолжить</button>
    </form>
</body>
</html>