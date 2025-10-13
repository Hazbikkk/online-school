<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Referral Link</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-blue-100 to-gray-100 flex items-center justify-center min-h-screen">    
<div class="bg-white p-10 rounded-xl shadow-xl max-w-lg w-full text-center transform hover:scale-105 transition-transform duration-300">
        <h1 class="text-3xl font-extrabold text-gray-900 mb-5">Ваша реферальная ссылка</h1>
        <p class="text-gray-500 mb-6 text-lg">Поделитесь этой ссылкой, она активна 30 минут.</p>
        <div class="bg-gray-50 p-5 rounded-lg border border-gray-200 mb-6">
            <a href="{{ $refssilka }}" class="text-blue-700 hover:text-blue-900 font-medium break-all">{{ $refssilka }}</a>
        </div>
        <button onclick="navigator.clipboard.writeText('{{ $refssilka }}').then(() => alert('Ссылка скопирована!'))" 
                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg transition-colors duration-300">
            Скопировать ссылку
        </button>
    </div>
</body>
</html>