<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
</head>
<body>
    <header>
        <nav>
            <div class="pag_title">
                <div class="logo"></div>
                <div class="pag_name"> Consultorio Médico</div>
            </div>
            <div class="nav_menu"></div>
        </nav>
    </header>
    
    <main>
        @yield('content')
    </main>
    
    <footer>
        <article class="redes">
            <div class="linkedin">
                <span class="linkedin_icon"></span>
                <p>Linkedin</p>
            </div>
            <div class="github">
                <span class="github_icon"></span>
                <p>GitHub</p>
            </div>
            <div class="gmail">
                <span class="gmail_icon"></span>
                <p>Correo</p>
            </div>
        </article>
        <div class="creador">
            <p>Re-versionado por Roselló Federico</p>
        </div>
    </footer>
</body>
</html>