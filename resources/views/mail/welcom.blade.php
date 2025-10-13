
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Приветственное письмо</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            background-color: #f4f4f9;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        .header {
            background: linear-gradient(135deg, #4a90e2, #50e3c2);
            padding: 30px;
            text-align: center;
            color: white;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
            font-weight: 600;
        }
        .content {
            padding: 30px;
            text-align: center;
        }
        .content p {
            font-size: 16px;
            line-height: 1.6;
            margin: 15px 0;
        }
        .code {
            display: inline-block;
            background-color: #f0f0f0;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 18px;
            font-weight: bold;
            color: #4a90e2;
            margin: 20px 0;
        }
        .footer {
            background-color: #f4f4f9;
            padding: 20px;
            text-align: center;
            font-size: 14px;
            color: #666;
        }
        @media only screen and (max-width: 600px) {
            .container {
                margin: 10px;
            }
            .header h1 {
                font-size: 20px;
            }
            .content {
                padding: 20px;
            }
            .content p {
                font-size: 14px;
            }
            .code {
                font-size: 16px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Здравствуйте, {{ $name }}!</h1>
        </div>
        <div class="content">
            <p>Добро пожаловать! Мы рады, что вы присоединились к нам.</p>
            <p>Ваш код доступа:</p>
            <div class="code">{{ $code }}</div>
            <p>Спасибо за регистрацию! Если у вас есть вопросы, наша команда всегда готова помочь.</p>
        </div>
        <div class="footer">
            <p>С уважением, Команда Online-School</p>
        </div>
    </div>
</body>
</html>