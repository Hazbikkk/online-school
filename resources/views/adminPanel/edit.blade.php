<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Редактирование учителя</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-blue-100 to-gray-100 flex items-center justify-center min-h-screen py-8">
    <div class="bg-white p-8 rounded-xl shadow-2xl max-w-lg w-full transform transition-all duration-300 hover:shadow-3xl">
        <h2 class="text-3xl font-extrabold text-gray-900 mb-6 text-center">Редактирование учителя</h2>
        <p class="text-gray-600 mb-8 text-center">Обновите информацию об учителе</p>

        <form method="POST" action="{{ route('adminPanel.update', $teacher->id) }}">
            @csrf
            @method('PUT')

            <!-- Поле: ФИО -->
            <div class="mb-6">
                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Полное ФИО</label>
                <input type="text" name="name" id="name" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200" value="{{ old('name', $teacher->name) }}" placeholder="Введите полное ФИО учителя" required>
                @error('name')
                    <span class="text-red-500 text-sm mt-2 block">{{ $message }}</span>
                @enderror
            </div>

            <!-- Поле: Должность -->
            <div class="mb-8">
                <label for="object" class="block text-sm font-medium text-gray-700 mb-2">Должность</label>
                <select name="object" id="object" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200" required>
                    <option value="Учитель математики" {{ old('object', $teacher->object) === 'Учитель математики' ? 'selected' : '' }}>Математика</option>
                    <option value="Учитель физики" {{ old('object', $teacher->object) === 'Учитель физики' ? 'selected' : '' }}>Физика</option>
                    <option value="Учитель русского" {{ old('object', $teacher->object) === 'Учитель русского' ? 'selected' : '' }}>Русский</option>
                    <option value="Учитель географии" {{ old('object', $teacher->object) === 'Учитель географии' ? 'selected' : '' }}>География</option>
                </select>
                @error('object')
                    <span class="text-red-500 text-sm mt-2 block">{{ $message }}</span>
                @enderror
            </div>

            <!-- Кнопка отправки -->
            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg transition-colors duration-200">
                Обновить
            </button>
        </form>
    </div>
</body>
</html>