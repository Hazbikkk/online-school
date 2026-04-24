<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Профиль сотрудника</title>
    <!-- Подключение Tailwind CSS через CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Подключение иконок Font Awesome для визуальных акцентов -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        /* Плавная анимация для формы и изображения */
        .fade-in {
            animation: fadeIn 0.5s ease-in-out;
        }
        @keyframes fadeIn {
            0% { opacity: 0; transform: translateY(10px); }
            100% { opacity: 1; transform: translateY(0); }
        }
        /* Скрытие стандартного input[type=file] и стилизация кастомной кнопки */
        .custom-file-upload {
            display: inline-block;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .custom-file-upload:hover {
            background-color: #dbeafe;
        }
        input[type="file"] {
            display: none;
        }
        /* Стиль для прогресс-бара (если добавить JS в будущем) */
        .progress-bar {
            transition: width 0.3s ease-in-out;
        }
        /* Стили для боковых меню */
        .sidebar, .social-sidebar {
            position: sticky;
            top: 1rem;
        }
        .sidebar a, .social-sidebar a {
            display: block;
            padding: 0.5rem 1rem;
            margin-bottom: 0.5rem;
            border-radius: 0.5rem;
            transition: background-color 0.3s ease;
        }
        .sidebar a:hover, .social-sidebar a:hover {
            background-color: #dbeafe;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-gray-100 to-blue-50 min-h-screen p-4 sm:p-6">
    @if($role_name['role'] == "Teacher")
    <!-- Верхняя ссылка "Ваша группа" -->
    <div class="flex justify-center mb-6">
        <a href="{{ route('group.index') }}" class="text-blue-600 font-semibold text-lg hover:underline">
            <i class="fas fa-users mr-2"></i> Ваша группа
        </a>
    </div>
    @endif

    <div class="flex flex-col lg:flex-row gap-6 max-w-6xl mx-auto justify-center">
        <!-- Левое боковое меню -->
        <div class="sidebar lg:w-64 bg-white shadow-xl rounded-2xl p-6">
            <h3 class="text-lg font-semibold text-gray-700 mb-4">Меню</h3>
            <nav>
                <a href="#home" class="text-blue-600 font-medium hover:text-blue-800">
                    <i class="fas fa-home mr-2"></i> Главная
                </a>
                <a href="#config" class="text-blue-600 font-medium hover:text-blue-800">
                    <i class="fas fa-cog mr-2"></i> Настройки аккаунта
                </a>
                <a href="#jaloba" class="text-blue-600 font-medium hover:text-blue-800">
                    <i class="fas fa-exclamation-triangle mr-2"></i> Подать жалобу
                </a>
                <a href="{{ route('profile.logout') }}" class="text-red-600 font-medium hover:text-red-800">
                    <i class="fas fa-sign-out-alt mr-2"></i> Выйти
                </a>
            </nav>
        </div>

        <!-- Основной контент -->
        <div class="max-w-lg w-full bg-white shadow-xl rounded-2xl p-6 sm:p-8 transform transition-all hover:shadow-2xl fade-in">
            <!-- Форма загрузки аватара -->
            <form method="POST" action="{{ route('avatar.uploade') }}" enctype="multipart/form-data" class="mb-6">
                @csrf
                <div class="flex flex-col items-center sm:items-start">
                    <label for="avatar-upload" class="block text-gray-700 font-semibold mb-2 text-center sm:text-left">Обновить аватар:</label>
                    <div class="flex flex-col sm:flex-row items-center gap-4">
                        <label for="avatar-upload" class="custom-file-upload bg-blue-50 text-blue-700 font-semibold py-2 px-4 rounded-lg border border-blue-200 hover:bg-blue-100 transition">
                            <i class="fas fa-upload mr-2"></i> Выбрать файл
                        </label>
                        <input id="avatar-upload" type="file" name="avatar" accept="image/*">
                        <input type="hidden" name="email" value="{{ $empl['email'] }}">
                        <button type="submit" class="bg-blue-500 text-white font-semibold py-2 px-4 rounded-lg hover:bg-blue-600 transition">
                            <i class="fas fa-check mr-2"></i> Обновить
                        </button>
                    </div>
                    <!-- Сообщения -->
                    <div class="mt-3 text-center sm:text-left">
                        @if (session('success'))
                            <div class="text-green-600 font-semibold flex items-center">
                                <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="text-red-600 font-semibold flex items-center">
                                <i class="fas fa-exclamation-circle mr-2"></i> {{ session('error') }}
                            </div>
                        @endif
                        @error('avatar')
                            <div class="text-red-600 font-semibold flex items-center">
                                <i class="fas fa-exclamation-circle mr-2"></i> {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </form>

            <!-- Аватар -->
            <div class="flex justify-center mb-6">
                <img
                    src="{{ isset($empl['avatar']) ? asset('storage/' . $empl['avatar']) : 'https://via.placeholder.com/150' }}"
                    class="w-36 h-36 rounded-full object-cover border-4 border-blue-300 shadow-md transition-transform hover:scale-105"
                >
            </div>

            <!-- Имя сотрудника -->
            <h2 class="text-3xl font-extrabold text-gray-900 text-center mb-4">
                {{ $empl['name'] }}
            </h2>

            <!-- Должность -->
            <div class="flex items-center justify-center mb-4">
                <i class="fas fa-briefcase text-blue-500 mr-2"></i>
                <h3 class="text-xl font-semibold text-gray-700">Должность: {{ $role }}</h3>
            </div>

            <!-- Почта -->
            <div class="mb-6">
                <div class="flex items-center justify-center sm:justify-start">
                    <i class="fas fa-envelope text-blue-500 mr-2"></i>
                    <h3 class="text-lg font-semibold text-gray-700">Почта:</h3>
                </div>
                <p class="text-xl text-blue-600 font-medium text-center sm:text-left">{{ $empl['email'] }}</p>
            </div>

            <!-- Стаж -->
            <div class="mb-6">
                <div class="flex items-center justify-center sm:justify-start">
                    <i class="fas fa-clock text-blue-500 mr-2"></i>
                    <h3 class="text-lg font-semibold text-gray-700">Стаж:</h3>
                </div>
                <p class="text-xl text-blue-600 font-medium text-center sm:text-left">
                    @if($empl['years'] > 4)
                        {{ $empl['years'] . ' лет' }}
                    @else
                        {{ $empl['years'] . ' года' }}
                    @endif
                </p>
            </div>

            <!-- О сотруднике -->
            <div>
                <div class="flex items-center justify-center sm:justify-start">
                    <i class="fas fa-info-circle text-blue-500 mr-2"></i>
                    <h3 class="text-lg font-semibold text-gray-700">О вас:</h3>
                </div>
                <p class="text-gray-600 leading-relaxed text-center sm:text-left">{{ $empl['about'] }}</p>
            </div>
        </div>

        <!-- Правое боковое меню -->
        <div class="social-sidebar lg:w-64 bg-white shadow-xl rounded-2xl p-6">
            <h3 class="text-lg font-semibold text-gray-700 mb-4">Информация</h3>
            <nav>
                <a href="#" class="text-blue-600 font-medium hover:text-blue-800">
                    <i class="fas fa-book mr-2"></i> Правила сайта
                </a>
                <h4 class="text-base font-semibold text-gray-700 mb-2">Мы в соц. сетях:</h4>
                <a href="https://web.telegram.org/k/#@chillEvryDay" target="_blank" class="text-blue-600 font-medium hover:text-blue-800">
                    <i class="fab fa-telegram-plane mr-2"></i> Telegram Профиль
                </a>
                <a href="https://t.me/HadisDeveloper" target="_blank" class="text-blue-600 font-medium hover:text-blue-800">
                    <i class="fab fa-telegram-plane mr-2"></i> Telegram Канал
                </a>
            </nav>
        </div>
    </div>
</body>
</html>