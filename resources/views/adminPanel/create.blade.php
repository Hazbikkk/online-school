<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админ панель</title>
</head>
<script src="https://cdn.tailwindcss.com"></script>
<body>
    <form method = "POST" action = "{{ route('adminPanel.store') }}">

    @csrf

    <h1 class="block w-full max-w-md mx-auto">Имя:<h1> <input name="name" class="block w-full max-w-md mx-auto p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 mt-2" placeholder="Ввведите полное ФИО учителя"><br>
    @error('name')
                <span style="color: red;">{{ $message }}</span>
    @enderror
    <h1 class="block w-full max-w-md mx-auto">Предмет:<h1> 
    
<select class="block w-full max-w-md mx-auto p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 mt-2" name="object" id="object">
  <option value="Учитель математики">Математика</option>
  <option value="Учитель физики">Физика</option>
  <option value="Учитель русского">Русский</option>
  <option value="Учитель географии">География</option>
</select>
    @error('email')
                <span style="color: red;">{{ $message }}</span>
    @enderror

    <button type="submite" class="block max-w-md mx-auto mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" value = "создать студента">Создать</button>
    </form>
</body>
</html>