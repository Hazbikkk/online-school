<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Загрузить курс/урок</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-blue-50 to-gray-100 min-h-screen flex items-center justify-center p-6">
    <div class="bg-white p-10 rounded-2xl shadow-xl w-full max-w-lg transform transition-all hover:shadow-2xl">
        <h1 class="text-3xl font-extrabold text-gray-900 mb-8 text-center tracking-tight">Загрузить урок/курс для учеников</h1>

        <form method="POST" class="space-y-6">
            @csrf
            <div>
                <label for="course_name" class="block text-sm font-semibold text-gray-700">Название курса</label>
                <input type="text" id="course_name" name="course_name" class="mt-2 w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200" placeholder="Введите название курса" required>
            </div>

            <div>
                <label for="course_description" class="block text-sm font-semibold text-gray-700">Описание курса</label>
                <input type="text" id="course_description" name="course_description" class="mt-2 w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200" placeholder="Опишите курс" required>
            </div>

            <div>
                <label for="course_materials" class="block text-sm font-semibold text-gray-700">Загрузить фото/видео материалы</label>
                <input type="file" id="course_materials" name="course_materials" class="mt-2 w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg shadow-sm file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:bg-indigo-100 file:text-indigo-700 hover:file:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition duration-200">
            </div>

            <button type="submit" class="w-full bg-gradient-to-r from-indigo-600 to-blue-600 text-white py-3 px-4 rounded-lg font-semibold hover:from-indigo-700 hover:to-blue-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition duration-300 transform hover:-translate-y-1">Отправить</button>
        </form>
    </div>
</body>
</html>