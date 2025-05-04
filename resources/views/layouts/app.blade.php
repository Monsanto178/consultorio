<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<style>
    a:link, a:visited, a:hover{
        color: white;
        text-decoration: none;
    }
    .f-height {
        height: 5rem;
    }
    .h-height {
        height: 3rem;
    }
</style>
<body class="bg-white">
    <header class="bg-primary bg-gradient h-height">
        <nav class="text-light">
            <div class="pag_title">
                <div class="logo"></div>
                <div class="pag_name"> Consultorio Médico</div>
            </div>
            <div class="nav_menu"></div>
        </nav>
    </header>

    <div id="app">
        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <footer class="bg-primary bg-gradient f-height">
        <article class="d-flex justify-content-center align-items-center gap-5 text-light">
            <a href="" class="linkedin">
                <span class="linkedin_icon"></span>
                <p>Linkedin</p>
            </a>
            <a href="" class="github">
                <span class="github_icon"></span>
                <p>GitHub</p>
            </a>
            <a href="" class="gmail">
                <span class="gmail_icon"></span>
                <p>Correo</p>
            </a>
        </article>
        <div class="text-center text-light">
            <p>Re-versionado por Roselló Federico</p>
        </div>
    </footer>

    @yield('scripts')
</body>
</html>