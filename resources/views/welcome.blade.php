<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Bienvenue</title>
</head>
<body>
    <h1>Bienvenue sur notre plateforme de gestion de vos boutiques</h1>

    @if (Auth::check())
        <!-- Si user connecté -->
        <p>Bonjour, {{ Auth::user()->name }} !</p>
        <p>
            <a href="{{ route('dashboard') }}">
                <button>Accéder au Dashboard</button>
            </a>
        </p>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit">Se déconnecter</button>
        </form>
    @else
        <!-- Si user non connecté-->
        <p>
            <a href="{{ route('register.form') }}">
                <button>Inscription</button>
            </a>
        </p>

        <p>
            <a href="{{ route('login.form') }}">
                <button>Connexion</button>
            </a>
        </p>
    @endif
</body>
</html>
