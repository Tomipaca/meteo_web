<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <title>Aktuální počasí</title>
</head>

<body>
    <h1>Aktuální počasí v České republice</h1>
    <form action="weather.php" method="GET">
        <label>Zadejte název města v ČR:</label>
        <input type="text" name="city" required>
        <input type="submit" value="Zobrazit počasí">
    </form>
</body>

</html>