<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Профиль сотрудника</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="bg-gradient-to-br from-blue-100 to-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-xl shadow-2xl max-w-lg w-full transform transition-all duration-300 hover:shadow-3xl">
        <h1 class="text-3xl font-extrabold text-gray-900 mb-6 text-center">Привет, {{ $role_name }}!</h1>
        <p class="text-gray-600 mb-8 text-center">Заполни форму, чтобы создать свой профиль</p>
        
        <form method="POST" action="{{ route('employee.store') }}">
            @csrf
            
            <!-- Поле: Полное ФИО -->
            <div class="mb-6">
                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Полное ФИО</label>
                <input type="text" name="name" id="name" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200" value="{{ old('name') }}" required>
                @error('name')
                    <span class="text-red-500 text-sm mt-2 block">{{ $message }}</span>
                @enderror
            </div>
            
            <!-- Поле: Лет опыта -->
            <div class="mb-6">
                <label for="experience_years" class="block text-sm font-medium text-gray-700 mb-2">Лет опыта</label>
                <input type="number" name="experience_years" id="experience_years" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200" value="{{ old('experience_years') }}" min="0" required>
                @error('experience_years')
                    <span class="text-red-500 text-sm mt-2 block">{{ $message }}</span>
                @enderror
            </div>
            
            <!-- Поле: Пароль -->
             <script src="jquery.js"></script>
<script>
    $(document).ready(function() {
        $('#repPass').change(function() {
            var pass = $("#pass").val();
            var pass_rep = $("#repPass").val();

            if (pass != pass_rep) {
                $("#repPass").css('border', 'red 1px solid');
                $('#errorBlock').html('Пароли не совпадают');
            }
        });
    });
</script>
<div id="errorBlock"></div>
            <div class="mb-6">
                <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Придумайте пароль</label>
                <input type="password" name="password" id="pass" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200" required>
                @error('password')
                    <span class="text-red-500 text-sm mt-2 block">{{ $message }}</span>
                @enderror
                <label for="password" class="mt-4 block text-sm font-medium text-gray-700 mb-2">Повторите пароль</label>
                <input type="password" name="password_repeat" id="repPass" class="mt-1 w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200" required>
</div>

            
            <!-- Поле: Описание -->
            <div class="mb-8">
                <label for="about" class="block text-sm font-medium text-gray-700 mb-2">Описание о себе(это увидят дети и их родители при входе на сайт)</label>
                <textarea name="about" id="about" rows="4" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200" placeholder="Расскажите о себе...">{{ old('about') }}</textarea>
                @error('about')
                    <span class="text-red-500 text-sm mt-2 block">{{ $message }}</span>
                @enderror
            </div>
            
            <!-- Кнопка отправки -->
            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg transition-colors duration-300">
                Создать профиль
            </button>
        </form>
    </div>
</body>
</html>