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
        <a href="{{ route('home') }}">{{ __('Home') }}</a>
        <a href="{{ route('tasks.index') }}">{{ __('Tasks') }}</a>
        <a href="{{ route('profile.show') }}">{{ __('Profile') }}</a>
        <a href="{{ route('about') }}">{{ __('About') }}</a>
        <a href="{{ route('customers.index') }}">{{ __('Customers') }}</a>
        <a href="{{ route('users.index') }}">{{ __('Users') }}</a>
        
        <div style="display: inline-block; margin-left: 20px; vertical-align: middle;">
            <div style="display: flex; align-items: center; gap: 10px;">
                <span style="color: white; font-size: 14px;">TFA</span>
                <label class="toggle-switch" style="position: relative; display: inline-block; width: 60px; height: 30px;">
                    <input type="checkbox" id="siteToggle" style="opacity: 0; width: 0; height: 0;">
                    <span class="slider" onclick="toggleSite()" style="position: absolute; cursor: pointer; top: 0; left: 0; right: 0; bottom: 0; background: linear-gradient(90deg, #00b894, #0984e3); border-radius: 34px; transition: .4s; box-shadow: 0 2px 8px rgba(0,0,0,0.2);">
                        <span class="slider-knob" style="position: absolute; height: 24px; width: 24px; left: 3px; bottom: 3px; background-color: white; border-radius: 50%; transition: .4s; box-shadow: 0 2px 4px rgba(0,0,0,0.3);"></span>
                    </span>
                </label>
                <span style="color: white; font-size: 14px;">TSA</span>
            </div>
        </div>
    </nav>
    
    <script>
        function toggleSite() {
            const checkbox = document.getElementById('siteToggle');
            const knob = document.querySelector('.slider-knob');
            
            if (checkbox.checked) {
                // TSA site active - redirect to TSA
                window.location.href = '/';
                knob.style.left = '33px';
            } else {
                // TFA site active - redirect to TFA
                window.location.href = 'http://127.0.0.1:8000/tfa';
                knob.style.left = '3px';
            }
        }
        
        // Initialize the toggle based on current URL
        function initToggle() {
            const checkbox = document.getElementById('siteToggle');
            const knob = document.querySelector('.slider-knob');
            
            if (window.location.hostname === 'localhost' || window.location.hostname === '127.0.0.1') {
                // TFA site
                checkbox.checked = false;
                knob.style.left = '3px';
            } else {
                // TSA site
                checkbox.checked = true;
                knob.style.left = '33px';
            }
        }
        
        // Initialize when page loads
        document.addEventListener('DOMContentLoaded', initToggle);
    </script>

    <div class="container">
        @yield('content')
    </div>

</body>
</html>