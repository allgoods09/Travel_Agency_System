<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My App')</title>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">


    <style>
        /* Sticky footer setup */
        html, body {
            height: 100%;
        }
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background: url('{{ asset('images/travelbohol.jpg') }}') no-repeat center center fixed;
            background-size: cover;
            background-color: #000;
            opacity: 0;
            transition: opacity 0.1s ease;
            padding-top: 70px;
        }
        main {
            flex: 1;
        }
        html {
            overflow-y: scroll;
        }
    </style>
</head>
<body>

    @include('partials.navbar')

    <main class="container mt-5">
        @yield('content')
    </main>

    @include('partials.footer')

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            document.body.style.opacity = 1;
        });

        window.addEventListener("beforeunload", function () {
            document.body.style.opacity = 0;
        });
    </script>
</body>
<style>
.page-header {
    background: linear-gradient(90deg, #00b4db, #0083b0);
    color: white;
    padding: 1rem 1.5rem;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
}

.table {
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}

.table thead {
    background: linear-gradient(90deg, #00b4db, #0083b0);
    color: #fff;
}

.table tbody tr:hover {
    background-color: #e0f7fa;
    transition: background-color 0.3s ease;
}

.pagination .page-link {
    color: #0083b0;
    border-radius: 50%;
    margin: 0 3px;
}

.pagination .active .page-link {
    background-color: #00b4db;
    border-color: #00b4db;
    color: white;
}
</style>
</html>
