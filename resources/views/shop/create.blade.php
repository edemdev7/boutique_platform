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

    <form action="{{ route('shop.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">Nom de la Boutique :</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" required>
        </div>
        <button type="submit">Créer la boutique</button>
    </form>

    <br>
    <h2>Vos 10 dernières boutiques</h2>
    @if(isset($shops) && $shops->count() > 0)
        <ul>
            @foreach ($shops as $shop)
                <li>
                    <a href="{{ route('shop.deployed', ['shopName' => $shop->name]) }}">
                        {{ $shop->name }}
                    </a>
                    <span> - Créée le {{ $shop->created_at->format('d/m/Y H:i') }}</span>
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
