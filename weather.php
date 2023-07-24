<?php
$apiKey = getenv('apiKey');

// Funkce pro získání dat z API OpenWeatherMap
function getWeatherData($city, $apiKey): array {
    $url = "https://api.openweathermap.org/data/2.5/weather?q=$city,lang=cz&CZ&appid=$apiKey";

    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($curl);
    curl_close($curl);

    return json_decode($response, true);
}

// Funkce pro převod teploty z Kelvinů na Celsius
function kelvinToCelsius($kelvin): float {
    return $kelvin - 273.15;
}

// Zpracování uživatelského vstupu (město)
if (isset($_GET['city'])) {
    $city = urldecode($_GET['city']);
    $weatherData = getWeatherData($city, $apiKey);

    if ($weatherData) {
        // Převody Kelvina na Celsius
        $temperatureKelvin = $weatherData['main']['temp'];
        $perceivedTemperatureKelvin = $weatherData['main']['feels_like'];
        $temperatureCelsius = kelvinToCelsius($temperatureKelvin);
        $perceivedTemperatureCelsius = kelvinToCelsius($perceivedTemperatureKelvin);
        // Oblačnost
        $cloudiness = $weatherData['weather'][0]['description'];
        // Tlak v hPa
        $pressure = $weatherData['main']['pressure'];
        // Vlhkost
        $humidity = $weatherData['main']['humidity'];
        // Rychlost větru
        $windSpeed = $weatherData['wind']['speed']; 

        echo "Aktuální teplota ve městě $city je $temperatureCelsius °C<br>";
        echo "Pocitová teplota ve mestě $city je $perceivedTemperatureCelsius °C<br>";
        echo "Oblačnost: $cloudiness <br>";
        echo "Tlak je $pressure hPa <br>";
        echo "Vlhokost je $humidity % <br>";
        echo "Rychlost větru je $windSpeed km/h <br>";
    } else {
        echo "Nepodařilo se získat data o počasí pro $city.";
    }
}
