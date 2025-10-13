<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Выбор роли сотрудника</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-blue-100 to-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-xl shadow-2xl max-w-lg w-full transform transition-all duration-300 hover:shadow-3xl">
        <p class="text-gray-600 mb-8 text-center">Выбери роль сотрудника для создания профиля</p>
        
        <form method="POST" action="{{ route('employee.store') }}">
            @csrf
            
            <!-- Поле: Роль сотрудника -->
            <div class="mb-8">
                <label for="role_id" class="block text-sm font-medium text-gray-700 mb-2">Роль сотрудника</label>
                <select name="role_id" id="role_id" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200" required>
                    @foreach($roles as $role)
                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                    @endforeach
                </select>
                @error('role_id')
                    <span class="text-red-500 text-sm mt-2 block">{{ $message }}</span>
                @enderror
            </div>
            
            <!-- Кнопка отправки -->
            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg transition-colors duration-300">
                Сгенерировать ссылку
            </button>
        </form>
    </div>
</body>
</html>