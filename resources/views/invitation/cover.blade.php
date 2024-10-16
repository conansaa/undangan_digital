<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Undangan Pernikahan</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f9f9f9;
        }
        .container {
            margin-top: 50px;
        }
        h1 {
            font-size: 36px;
        }
        h2 {
            font-size: 28px;
        }
        .date {
            font-size: 24px;
            margin-bottom: 20px;
        }
        .button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Undangan Pernikahan</h1>
        <h2>{{ $groom->name }} & {{ $bride->name }}</h2>
        <div class="date">
            Tanggal: {{ $eventDetail->date->format('d F Y') }}
        </div>
        <a href="{{ route('invitation.detail') }}" class="button">Lihat Undangan Lengkap</a>
    </div>
</body>
</html>
