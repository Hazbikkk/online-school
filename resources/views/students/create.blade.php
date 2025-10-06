<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method = "POST" action = "{{ route('students.store') }}">

    @csrf

    Имя: <input name="name"<br>
    @error('name')
                <span style="color: red;">{{ $message }}</span>
    @enderror
    Предмет: 
    
<select name="object" id="object">
  <option value="math">Математика</option>
  <option value="phisic">Физика</option>
  <option value="russian">Русский</option>
  <option value="geographi">География</option>
</select>
    @error('email')
                <span style="color: red;">{{ $message }}</span>
    @enderror

    <button type="submite" value = "создать студента">
    </form>
</body>
</html>