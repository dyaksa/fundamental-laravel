<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    @yield('style')
    <title>{{ $title ?? "Blog Post" }}</title>
</head>

<body>
    <header>
        @include("layouts.navigation")
    </header>
    <main class="py-4">
        @yield('content')
    </main>
    <footer>
    </footer>
    @yield('script')
</body>

</html>
