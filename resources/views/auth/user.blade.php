<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация ученика</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #7c3aed, #3b82f6, #22d3ee);
            background-size: 200% 200%;
            animation: gradientAnimation 10s ease infinite;
        }
        @keyframes gradientAnimation {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        .input-focus {
            transition: all 0.3s ease;
        }
        .input-focus:focus {
            transform: scale(1.02);
            box-shadow: 0 0 10px rgba(59, 130, 246, 0.5);
        }
        .btn-hover {
            transition: all 0.3s ease;
        }
        .btn-hover:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body class="gradient-bg font-sans antialiased flex items-center justify-center min-h-screen">
    <div class="w-full max-w-md mx-auto bg-white p-8 rounded-2xl shadow-xl relative">
        <!-- Navigation Link -->
        <a 
            href="{{ route('registration.students') }}" 
            class="absolute top-4 right-4 px-5 py-2.5 bg-gradient-to-r from-purple-600 to-blue-600 text-white rounded-md text-base font-medium hover:from-purple-700 hover:to-blue-700 transition-all duration-300 sm:px-4 sm:py-2 sm:text-sm z-[1000]"
        >
            Получили код доступа? (Нажми на меня)
        </a>

        <!-- Form -->
        <form method="POST" action="{{ route('auth.user.store') }}" class="space-y-6">
            @csrf
            <h1 class="text-3xl font-bold text-center text-transparent bg-clip-text bg-gradient-to-r from-purple-600 to-blue-600">
                Регистрация ученика
            </h1>

            <!-- Name Field -->
            <div>
                <label for="name" class="block text-gray-700 font-medium mb-2">Имя:</label>
                @error('name')
                    <span class="text-red-500 text-sm block mb-2">{{ $message }}</span>
                @enderror
                <input 
                    type="text" 
                    name="name" 
                    id="name" 
                    placeholder="Введите ваше ФИО" 
                    class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 input-focus bg-gray-50"
                >
            </div>

            <!-- Email Field -->
            <div>
                <label for="email" class="block text-gray-700 font-medium mb-2">Почта:</label>
                @error('email')
                    <span class="text-red-500 text-sm block mb-2">{{ $message }}</span>
                @enderror
                <input 
                    type="email" 
                    name="email" 
                    id="email" 
                    placeholder="Введите вашу эл. почту" 
                    class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 input-focus bg-gray-50"
                >
            </div>

            <!-- Submit Button -->
            <button 
                type="submit" 
                class="w-full px-5 py-3 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-lg text-base font-medium btn-hover"
            >
                Зарегистрироваться
            </button>
        </form>
    </div>
</body>
</html>