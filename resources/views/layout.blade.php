<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
            <meta content="width=device-width, initial-scale=1.0" name="viewport">
                <title>
                    @yield('title', 'root')
                </title>
            </meta>
        </meta>
        <link href="/css/app.css" rel="stylesheet"/>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
        <script defer="" src="/js/app.js">
        </script>
    </head>
</html>
<body>
    <section class="container-fluid">
        <header>
            @include('partails.menu')
            {{-- @include('partials.sessions') --}}
        </header>
        <main class="py-3 px-3">
            @yield('content')
        </main>
    </section>
</body>
