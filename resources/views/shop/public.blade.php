<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{ $shop->name }}</title>
</head>
<body>
    <h1>Boutique : {{ $shop->name }}</h1>
    <p>Créée par : {{ $user->name }}</p>
    <p>Email : {{ $user->email }}</p>
    <p>Âge : {{ $user->age }}</p>
</body>
</html>
