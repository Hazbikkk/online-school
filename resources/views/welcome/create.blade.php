<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Запись на курс</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        select {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='m6 8 4 4 4-4'/%3e%3c/svg%3e");
            background-position: right 0.75rem center;
            background-repeat: no-repeat;
            background-size: 1.5em;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen font-sans antialiased flex items-center justify-center p-4">

<div class="w-full max-w-md mx-auto">
    <div class="bg-white rounded-2xl shadow-xl p-8 border border-gray-100">
        
        <!-- Заголовок -->
        <h1 class="text-2xl sm:text-3xl font-bold text-center text-gray-800 mb-8">
            Запишитесь на курс
        </h1>

        <!-- Форма -->
        <form method="POST" action="#" class="space-y-6">
            
            <!-- Выбор предмета -->
            <div>
                <label for="object" class="block text-sm font-medium text-gray-700 mb-2">
                    Выберите предмет
                </label>
                <select 
                    name="object" 
                    id="object"
                    class="w-full px-4 py-3 text-gray-800 bg-white border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200"
                >
                    @foreach($objects as $object)
                        <option>{{ $object }}</option>
                    @endforeach
                
                </select>
            </div>

            <!-- Выбор преподавателя -->
            <div>
                <label for="teacher" class="block text-sm font-medium text-gray-700 mb-2">
                    Выберите преподавателя
                </label>
                <select 
                    name="teacher" 
                    id="teacher"
                    class="w-full px-4 py-3 text-gray-800 bg-white border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200"
                >
                    @foreach($names as $name)
                        <option>{{ $name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Кнопка -->
            <div class="pt-4">
                <button 
                    type="submit" 
                    class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-semibold py-3 px-6 rounded-lg shadow-md hover:shadow-lg hover:from-blue-700 hover:to-indigo-700 transform hover:-translate-y-0.5 transition duration-300"
                >
                    Записаться на курс
                </button>
            </div>
        </form>
    </div>
</div>

</body>
</html>