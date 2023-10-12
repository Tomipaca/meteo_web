<!DOCTYPE html>
<html lang="cs">
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
    <div class="form-container">
        <form action="weather.php" method="GET" class="form">
            <label>Zadejte název města v ČR:</label>
            <input type="text" name="city" required pattern="[A-Za-zěščřžýáíéúůĚŠČŘŽÝÁÍÉÚŮ ]+" placeholder="Město">
            <input type="submit" value="Zobrazit počasí">
        </form>
    </div>
</body>

</html>