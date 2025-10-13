<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация в онлайн-школу</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <script src="https://cdn.tailwindcss.com"></script>
    @endif
    <style>
        body {
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            transition: background-position 0.5s ease;
        }
        body:hover {
            background-position: center 10px; /* Лёгкий параллакс-эффект */
        }
        .form-container {
            animation: slideUp 0.8s ease-out;
        }
        @keyframes slideUp {
            0% { opacity: 0; transform: translateY(30px); }
            100% { opacity: 1; transform: translateY(0); }
        }
        .input-focus {
            transition: all 0.3s ease;
        }
        .input-focus:focus {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(59, 130, 246, 0.3);
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center p-4 lg:p-8" style="background-image: url('https://images.unsplash.com/photo-1516321310764-8df5be73b6f0?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80');">
    <div class="absolute inset-0 bg-black/60 dark:bg-black/80"></div> <!-- Оверлей для читаемости -->
    
    <div class="relative w-full max-w-md form-container">
        <div class="bg-white/95 dark:bg-gray-800/95 rounded-xl shadow-2xl p-8 backdrop-blur-md border border-white/20 dark:border-gray-700/50">
            <!-- Логотип (опционально) -->
            <img src="/images/logo.png" alt="Логотип онлайн-школы" class="mx-auto mb-6 w-32 h-auto hidden" onerror="this.classList.add('hidden')">

            <!-- Заголовок -->
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-gray-800 dark:text-white mb-2">Регистрация ученика</h1>
                <p class="text-gray-600 dark:text-gray-300 text-sm">Введите код доступа для активации аккаунта</p>
            </div>

            <!-- Форма -->
            <form method="POST" action="{{ route('register.students.store') }}" class="space-y-6">
                @csrf
                
                <!-- Поле ввода кода -->
                <div>
                    <label for="code" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Код доступа
                    </label>
                    <input 
                        type="text" 
                        id="code" 
                        name="code" 
                        placeholder="Введите 4-значный код" 
                        value="{{ old('code') }}"
                        class="input-focus w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 transition-all duration-300"
                        required
                        maxlength="4"
                        pattern="[A-Za-z0-9]{4}"
                        title="Код должен содержать ровно 4 буквы или цифры"
                        autocomplete="off"
                    >
                    @error('code')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-400 flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                            </svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Кнопка -->
                <button 
                    type="submit" 
                    class="w-full px-6 py-3 bg-gradient-to-r from-blue-600 to-blue-700 text-white font-semibold rounded-lg hover:from-blue-700 hover:to-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all duration-300 transform hover:scale-[1.02] active:scale-[0.98] shadow-lg hover:shadow-xl"
                >
                    <span class="flex items-center justify-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                        </svg>
                        Продолжить регистрацию
                    </span>
                </button>
            </form>

            <!-- Ссылка назад -->
            <div class="mt-6 text-center">
                <a href="{{ route('.') }}" class="text-blue-600 dark:text-blue-400 hover:text-blue-700 dark:hover:text-blue-300 font-medium transition-colors">
                    ← Вернуться на главную
                </a>
            </div>

            <!-- Сообщение об успехе -->
            @if(session('success'))
                <div class="mt-6 p-4 bg-green-100 dark:bg-green-900/80 border border-green-200 dark:border-green-800 text-green-700 dark:text-green-300 rounded-lg">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        {{ session('success') }}
                    </div>
                </div>
            @endif
        </div>
    </div>
</body>
</html>