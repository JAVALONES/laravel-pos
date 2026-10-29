<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel POS</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background: #f4f6f8;
            color: #333;
        }

        nav {
            background: #1f4e79;
            padding: 15px;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin-right: 18px;
            font-weight: bold;
        }

        nav a:hover {
            text-decoration: underline;
        }

        .container {
            width: 85%;
            max-width: 1000px;
            margin: 30px auto;
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.10);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th {
            background: #1f4e79;
            color: white;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        tr:nth-child(even) {
            background: #f2f2f2;
        }
    </style>
</head>
<body>

    <nav>
        <a href="{{ route('home') }}">Home</a>
        <a href="{{ route('tasks.index') }}">Tasks</a>
        <a href="{{ route('profile.show') }}">Profile</a>
        <a href="{{ route('about') }}">About</a>
    </nav>

    <div class="container">
        @yield('content')
    </div>

</body>
</html>