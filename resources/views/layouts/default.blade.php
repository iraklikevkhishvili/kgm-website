{{-- resources/views/layouts/default.blade.php --}}
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="/favicon/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="/favicon/favicon.svg" />
    <link rel="shortcut icon" href="/favicon/favicon.ico" />
    <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png" />
    <link rel="manifest" href="/favicon/site.webmanifest" />


    <title>@yield('title', 'KGM Wines')</title>

    {{-- Global styles (Tailwind + site SCSS) --}}
    @vite(['resources/css/app.css', 'resources/scss/app.scss'])
    @vite(['resources/css/app.css', 'resources/scss/font.scss'])

    {{-- Optional: layout-level partial styles --}}
    @vite(['resources/scss/header.scss', 'resources/scss/footer.scss'])

    @yield('head-end')
</head>

<body>

    {{-- Header partial --}}
    @include('layouts.header')

    <main>
        @yield('content')
    </main>

    {{-- Footer partial --}}
    @include('layouts.footer')

    {{-- Global scripts --}}
    @vite(['resources/js/app.js'])

    {{-- Optional: layout-level partial scripts --}}
    @vite(['resources/js/header.js', 'resources/js/footer.js'])

    @yield('body-end')
</body>

</html>
