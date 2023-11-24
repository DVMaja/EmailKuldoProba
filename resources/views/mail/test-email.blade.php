<br>

<!DOCTYPE html>
<html>

<head>
    <title></title>
</head>

<body>
    <h2>Hey, {{ $details['name'] }},</h2>
    <br>
    <p>Ez egy teszt email, SMPT segítsével. Mostmár formázva</p>
    <h3>Automatizált üzenethez</h3>
    <p>Cíklussal változó szöveg: {{ $details['title'] }}</p>
    <p>{{ $details['body'] }}</p>
</body>

</html>