<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="{{ route('adminPanel.update', $teacher->id) }}">
    @csrf    
    @method('PUT')
        ФИО: <input name="name" placeholder="полное ФИО учителя" value="{{ $teacher->name }}">
        <select name="object" id="object">
            <option value="Учитель математики" @selected($teacher->object === 'Учитель математики')>Математика</option>
            <option value="Учитель физики" @selected($teacher->object === 'Учитель физики')>Физика</option>
            <option value="Учитель русского" @selected($teacher->object === 'Учитель русского')>Русский</option>
            <option value="Учитель географии" @selected($teacher->object === 'Учитель географии')>География</option>
        </select>

        <button type="submite">Обновить</button>
    </form>
</body>
</html>