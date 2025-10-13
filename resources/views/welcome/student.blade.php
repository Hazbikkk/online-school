<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online-School</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans antialiased">
    <div class="min-h-screen flex flex-col">
        <!-- Navigation -->
        <nav class="bg-gradient-to-r from-blue-600 to-indigo-600 p-4 shadow-md">
            <div class="max-w-7xl mx-auto flex flex-col sm:flex-row justify-center gap-4 sm:gap-6">
                <a href="{{ route('objects.math') }}" class="text-white text-lg font-medium hover:bg-blue-700 px-4 py-2 rounded-md transition duration-300">Математика</a>
                <a href="{{ route('objects.physics') }}" class="text-white text-lg font-medium hover:bg-blue-700 px-4 py-2 rounded-md transition duration-300">Физика</a>
                <a href="{{ route('objects.russian') }}" class="text-white text-lg font-medium hover:bg-blue-700 px-4 py-2 rounded-md transition duration-300">Русский</a>
                <a href="{{ route('objects.geography') }}" class="text-white text-lg font-medium hover:bg-blue-700 px-4 py-2 rounded-md transition duration-300">География</a>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="flex-grow flex items-center justify-center">
            <div class="max-w-4xl mx-auto text-center px-4 py-8">
                <h1 class="text-3xl sm:text-4xl font-bold text-gray-800 mb-6">
                    Приветствуем, {{ $name }}!
                </h1>
                <p class="text-lg sm:text-xl text-gray-600 mb-8">
                    Нажми на ссылки выше, чтобы пройти курс по любому предмету
                </p>
                <h2 class="text-xl sm:text-2xl font-semibold text-indigo-600">
                    За каждый пройденный урок на нашем портале тебе будут начисляться баллы знаний!
                </h2>
            </div>
        </main>

        <!-- Footer -->
        <footer class="bg-gray-200 py-4 text-center">
            <p class="text-gray-600 text-sm">© 2025 Онлайн-школа. Все права защищены.</p>
        </footer>
    </div>
</body>
</html>