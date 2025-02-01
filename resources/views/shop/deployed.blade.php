<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Boutique déployée</title>
</head>
<body>
    <h1>Confirmation de création de boutique</h1>
    <p>La boutique <strong>{{ $shopName }}</strong> a été déployée sur : 
    <a href="{{ $shopUrl }}" target="_blank">{{ $shopUrl }}</a>
    </p>
    <p><a href="{{ route('dashboard') }}">Retour au dashboard</a></p>
</body>
</html>
