<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Gestion des notes</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
        
        @livewireStyles()
    </head>
    <body>
        <header>
            <nav>
                @livewire('menu')
            </nav>
        </header>
        <main>
            @yield('main')
        </main>

        @livewireScripts()
    </body>
</html>