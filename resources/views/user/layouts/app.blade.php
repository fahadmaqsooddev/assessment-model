<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh; /* Ensure body takes full height */
            margin: 0;
            padding: 0;
            background-color: #f0f8ff;
        }
        .header-logo {
            height: 50px;
            object-fit: contain;
        }
        .settings-dropdown {
            position: relative;
        }
        .settings-menu {
            display: none;
            position: absolute;
            right: 0;
            top: 100%;
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 0.25rem;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
            z-index: 1000;
            min-width: 150px;
            transition: opacity 0.3s ease;
        }
        .settings-menu.show {
            display: block;
            opacity: 1;
        }
        .settings-menu a {
            color: #007bff;
            padding: 0.75rem 1.25rem;
            display: block;
            text-decoration: none;
            font-size: 14px;
        }
        .settings-menu a:hover {
            background-color: #f8f9fa;
        }
        .settings-dropdown:hover .settings-menu {
            display: block;
            opacity: 1;
        }
        .header {
            background-color: #007bff;
            color: #ffffff;
        }
        .header .btn-primary {
            background-color: #ffffff;
            color: #007bff;
            border: 1px solid #007bff;
        }
        .header .btn-primary:hover {
            background-color: #e7f0ff;
            color: #0056b3;
        }
        .content-area {
            flex: 1; /* Allow content area to grow */
            background-color: #ffffff;
            color: #333;
            padding: 2rem;
            border-radius: 0.5rem;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
            overflow-y: auto; /* Enable scrolling */
        }
        .footer {
            background-color: #007bff;
            color: #ffffff;
            border-top: 1px solid #0056b3;
            padding: 1rem;
            text-align: center;
        }
        .slider {
            -webkit-appearance: none;
            width: 100%;
            height: 8px;
            background: #ddd;
            outline: none;
            opacity: 0.7;
            transition: opacity .2s;
        }
        .slider:hover {
            opacity: 1;
        }
        .slider-label {
            margin-top: 10px;
            font-size: 16px;
        }
        .question-container {
            display: none;
            margin-bottom: 2rem;
        }

        .question-container2 {
            display: block;
            margin-bottom: 2rem;
        }


        .question-container.active {
            display: block; /* Show only the active question */
        }
    </style>
</head>
<body>
    @include('user.layouts.header')

    <!-- Content -->
    <div class="content-area">
        @yield('content')
    </div>

    @include('user.layouts.footer')

    <!-- Bootstrap JS and Dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
</body>
</html>
