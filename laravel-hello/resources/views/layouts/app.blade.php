<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'サンプルアプリ')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <header class="bg-primary text-white p-3">
        {{ $headerText ?? '' }}
    </header>

    <main class="container py-4">
        @yield('content')
    </main>

    <footer class="bg-light text-center p-3 border-top">
        {{ $footerText ?? '' }}
    </footer>
</body>
</html>
