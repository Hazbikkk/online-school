<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Главная') }}</title>

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
        @media(max-width: 320px)
        {
            li{
                font-size: 10px;
            }
            .course-icon{
                width: 10px;
            }
            svg
            {
                width: 20px;
            }
        }
        @media(max-width: 508px)
        {
            header
            {
                height: 40px;
            }
            #home, #about, #sponsors
            {
                margin-right: 5px;
            }
            #home, #about, #sponsors, #technical_support
            {
                font-size: 10px
            }
        }
        @media(max-width: 525px)
        {
            #home, #about, #sponsors, #technical_support
            {
                font-size: 15px;
            }
        }
        @media(min-width: 595px){
            #home
            {
                margin-left: 20px;
                margin-right: 10px;
            }
            #about, #sponsors {
                margin-right: 10px;
            }
            path
            {
                width: 30px;
            }
        }
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
        body {
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            transition: background-position 0.5s ease;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        body:hover {
            background-position: center 10px; /* Лёгкий параллакс-эффект */
        }
        .fade-in {
            animation: fadeIn 1s ease-in-out;
        }
        @keyframes fadeIn {
            0% { opacity: 0; transform: translateY(20px); }
            100% { opacity: 1; transform: translateY(0); }
        }
        .btn-hover {
            transition: all 0.3s ease;
        }
        .btn-hover:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }
        .card-hover {
            transition: all 0.3s ease;
        }
        .card-hover:hover {
            transform: scale(1.02);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 0;
        }
        .description {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-out;
        }
        .description.open {
            max-height: 300px; /* Увеличено для изображений и текста */
        }
        /* Новые стили для описаний */
        .course-item {
            display: flex;
            align-items: flex-start;
            gap: 1rem;
            padding: 1rem;
            border-radius: 0.5rem;
            background: linear-gradient(135deg, rgba(255,255,255,0.1), rgba(255,255,255,0.2));
            backdrop-filter: blur(5px);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .course-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
        }
        .course-icon {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 8px;
            border: 2px solid rgba(255,255,255,0.3);
        }
        .course-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: #fff;
            text-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
        }
        .course-description {
            font-size: 0.9rem;
            color: #e2e8f0;
            line-height: 1.5;
        }
        .toggle-icon {
            transition: transform 0.3s ease;
        }
        .rotate-180 {
            transform: rotate(180deg);
        }
        header {
            display: flex;
            justify-content: center;
            gap: 2.5rem;
            background-color: #ffffff;
            position: relative;
            z-index: 50;
            padding: 1rem 0;
        }

        header a {
            color: #000000;
            font-weight: 500;
            text-decoration: none;
        }

        header a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<header>
    <a class="mr-10" id="home" href="{{ route('.') }}">Главная</a>
    <a class="mr-10" id="about" href="#">О нас</a>
    <a class="mr-10" id="sponsors" href="#">Спонсоры</a>
    <a class="mr-10" id="technical_support" href="#">Поддержка</a>
</header>
<body class="p-6 lg:p-8" style="background-image: url('https://images.unsplash.com/photo-1516321310764-8df5be73b6f0?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80');">
    <div class="overlay bg-black/60 dark:bg-black/75"></div> <!-- Мягкий однотонный оверлей -->
    <div class="relative container mt-12 mx-auto max-w-3xl bg-white/95 dark:bg-gray-900/95 rounded-xl shadow-2xl p-8 text-center backdrop-blur-md fade-in">
        <!-- Логотип (опционально) -->
        <img src="/images/logo.png" alt="Логотип онлайн-школы" class="mx-auto mb-6 w-32 h-auto hidden" onerror="this.classList.add('hidden')">

        <!-- Заголовок -->
        <h1 class="text-5xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-500 to-blue-500 mb-4 tracking-tight">Добро пожаловать в онлайн-школу!</h1>
        <h2 class="text-2xl font-semibold text-gray-600 dark:text-gray-300 mb-8">{{ $title }}</h2>

        <!-- Плашки с преимуществами -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-8">
            <div class="p-4 bg-gradient-to-r from-purple-500/80 to-blue-500/80 rounded-lg card-hover text-white">
                <h3 class="text-lg font-semibold mb-2">Интерактивные уроки</h3>
                <p class="text-sm">Увлекательные задания и тесты, которые делают обучение интересным!</p>
            </div>
            <div class="p-4 bg-gradient-to-r from-blue-500/80 to-cyan-500/80 rounded-lg card-hover text-white">
                <h3 class="text-lg font-semibold mb-2">Баллы знаний</h3>
                <p class="text-sm">Зарабатывайте баллы за каждый урок и соревнуйтесь с друзьями!</p>
            </div>
            <div class="p-4 bg-gradient-to-r from-cyan-500/80 to-teal-500/80 rounded-lg card-hover text-white">
                <h3 class="text-lg font-semibold mb-2">Гибкость обучения</h3>
                <p class="text-sm">Учитесь в любое время и в своём темпе, где бы вы ни были!</p>
            </div>
            <div class="p-4 bg-gradient-to-r from-teal-500/80 to-purple-500/80 rounded-lg card-hover text-white">
                <h3 class="text-lg font-semibold mb-2">Лучшие преподаватели</h3>
                <p class="text-sm">Курсы от профессионалов, которые вдохновляют!</p>
            </div>
        </div>

        <!-- Список объектов (например, курсы) -->
        <div class="mb-8">
            <h3 class="text-xl font-medium text-white dark:text-gray-200 mb-4">Доступные курсы:</h3>
            <ul class="space-y-3 text-white">
                @foreach($objects as $object)
                    <li class="course-item card-hover cursor-pointer" onclick="toggleDescription(this)">
                        <img src="{{
    $object == 'Математика' ? asset('images/math_logo.png') :
    ($object == 'Физика' ? asset('images/physics_logo.png') :
    ($object == 'Русский' ? asset('images/russian_logo.png') :
    ($object == 'География' ? asset('images/geography_logo.png') :
    asset('images/default_logo.png'))))
}}" alt="{{ $object }} icon" class="course-icon">
                        <div class="flex-1">
                            <div class="flex justify-between items-center">
                                <span class="course-title">{{ $object }}</span>
                                <svg class="w-5 h-5 text-white transform transition-transform duration-300 toggle-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </div>
                            <div class="description course-description mt-2">
                                @if($object == 'Математика' && !empty($descript))
                                    {{ $descript[0] ?? "" }}
                                @elseif($object == 'Физика')
                                    {{ $descript[1] ?? "" }}
                                @elseif($object == 'Русский')
                                    {{ $descript[2] ?? "" }}
                                @elseif($object == 'География')
                                    {{ $descript[3] ?? "" }}
                                @endif
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>

        <!-- Кнопки входа -->
        <div class="flex flex-col sm:flex-row justify-center gap-4">
            <a href="{{ route('auth.admin') }}" class="px-6 py-3 bg-gradient-to-r from-blue-500 to-purple-500 text-white font-semibold rounded-md btn-hover flex items-center justify-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 100-4 2 2 0 000 4zm0 0h1m-4 4h6m-6 4h6"></path></svg>
                Войти как администратор
            </a>
            <a href="{{ route('auth.user') }}" class="px-6 py-3 bg-gradient-to-r from-green-500 to-teal-500 text-white font-semibold rounded-md btn-hover flex items-center justify-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                Войти как ученик
            </a>
        </div>

        <!-- Сообщения об успехе или ошибке -->
        @if(session('success'))
            <div class="mt-6 p-4 bg-green-100 dark:bg-green-900 text-green-700 dark:text-green-300 rounded-md">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="mt-6 p-4 bg-red-100 dark:bg-red-900 text-red-700 dark:text-red-300 rounded-md">
                {{ session('error') }}
            </div>
        @endif
    </div>

    <!-- JavaScript для разворачивания описания -->
    <script>
        function toggleDescription(element) {
            const description = element.querySelector('.description');
            const icon = element.querySelector('.toggle-icon');
            description.classList.toggle('open');
            icon.classList.toggle('rotate-180');
        }
    </script>
</body>
</html>
