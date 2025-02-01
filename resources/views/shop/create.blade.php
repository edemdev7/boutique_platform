<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Créer une Boutique</title>
</head>
<body>
    <h1>Créer une Boutique</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                   <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('shop.store') }}">
        @csrf
        <div>
            <label>Nom de la boutique:</label>
            <input type="text" name="name" pattern="[a-zA-Z0-9\-]+" title="Lettres, chiffres et tirets uniquement" required>
            <small>Uniquement lettres, chiffres et tirets (-)</small>
        </div>
        <button type="submit">Créer la boutique</button>
    </form>

    <br>
    <h2>Vos 10 dernières boutiques</h2>
    @if(isset($shops) && $shops->count() > 0)
        <ul>
            @foreach ($shops as $shop)
            <li>
                <a href="{{ url($shop->url) }}" target="_blank">{{ $shop->name }}</a>
                (Créée le {{ $shop->created_at->format('d/m/Y') }})
            </li>
            @endforeach
        </ul>
    @else
        <p>Aucune boutique créée pour le moment.</p>
    @endif

    <br>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Se déconnecter</button>
    </form>
</body>
</html>
