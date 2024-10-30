<?php

const API_URL = 'https://whenisthenextmcufilm.com/api/';

//Inicio de sesión de cURL 
$ch = curl_init(API_URL);

//indicar que se desea obtener datos de la peticion sin mostrarlo en pantalla

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//ejecutar la peticion

$result = curl_exec($ch);

$data = json_decode($result, true);

curl_close($ch);


?>

<head>
    <meta charset="UTF-8">
    <title>Película de Marvel</title>
    <meta name="description" content="Película de Marvel">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Centered viewport -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css">
</head>

<main>
    <section>
        <img src="<?php echo $data['poster_url'] ?>" width="300" alt="Película de <?php echo $data['title'] ?>" style="border-radius: 16px;">
    </section>

    <hgroup>
        <h3><?php echo $data['title'] ?> se estrena en <?php echo $data['days_until'] ?> días</h3>
        <p>Fecha de estreno: <?php echo $data['release_date'] ?></p>
        <p>la siguiente es: <?php echo $data['following_production']['title'] ?></p>
    </hgroup>
</main>

<style>
    :root {
        color-scheme: light dark;
    }

    body {
        display: grid;
        place-content: center;
    }

    section {
        display: flex;
        justify-content: center;
    }

    hgroup {
        display: flex;
        flex-direction: column;
        justify-content: center;
        text-align: center;
    }

    img {
        margin: 0 auto;

    }
</style>