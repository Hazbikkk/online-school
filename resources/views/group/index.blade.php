<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Группа - ...</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-gray-50 to-blue-50 min-h-screen flex items-center justify-center p-6">
    <div class="bg-white p-10 rounded-2xl shadow-xl max-w-md w-full text-center transform transition-all hover:shadow-2xl">
        <p class="text-lg font-medium text-gray-700 mb-6">У вас пока нет учеников</p>
        <a href="{{ route('group.create') }}" class="inline-block bg-gradient-to-r from-indigo-600 to-blue-600 text-white py-3 px-6 rounded-lg font-semibold hover:from-indigo-700 hover:to-blue-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition duration-300 transform hover:-translate-y-1">Добавить урок/курс</a>
    </div>
</body>
</html>