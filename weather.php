<?php
// Váš API klíč získaný po registraci na OpenWeatherMap
$apiKey = "ad736282b0ffa235e344ebf4cfae9fd8";

// Funkce pro získání dat z API OpenWeatherMap
function getWeatherData($city, $apiKey) {
    $url = "https://api.openweathermap.org/data/2.5/weather?q=$city,CZ&appid=$apiKey";

    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($curl);
    curl_close($curl);

    return json_decode($response, true);
}

// Zpracování uživatelského vstupu (město)
if (isset($_GET['city'])) {
    $city = urlencode($_GET['city']);
    $weatherData = getWeatherData($city, $apiKey);

    if ($weatherData) {
        // Zde můžete zpracovat data a zobrazit počasí uživateli
        $temperature = $weatherData['main']['temp'];
        $description = $weatherData['weather'][0]['description'];
        echo "Aktuální teplota v $city: $temperature °C<br>";
        echo "Popis počasí: $description<br>";
    } else {
        echo "Nepodařilo se získat data o počasí pro $city.";
    }
}
