<?php

const API_URL = "https://whenisthenextmcufilm.com/api";
 #Inicicializar una nueva sesion  de cURL; ch = cURL handle
 $ch = curl_init(API_URL);
// Indicar que queremos recbir el resultado de la peticion y no mostrarla en pantalla

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
/*Ejecutar la peticion
    y guardar el resultado
*/

$result = curl_exec($ch);
$data = json_decode($result, true);

curl_close($ch);
?>

<head>
    <title>La Proxima Pelicula de Marvel</title>
    <meta charset="UTF-8">
    <meta name="description" content="La Proxima Pelicula de Marvel">
    <meta name="keywords" content="Marvel, Pelicula, Estreno">
    <meta name="author" content="Fabriccio">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css"
/>
</head>

<main>
    <pre style="font-size: 10px; overflow: scroll; height: 100px;">
        <?php print_r($data); ?>
    </pre>
    <section>
        <img src="<?= $data["poster_url"];?>" width="200px"  alt="Poster de la pelicula" style="border-radius: 16px;">
    </section>

    <hgroup>
        <h3><?= $data["title"]; ?> se estrena en <?= $data["days_until"]?> dias</h2>
        <p>Fecha de estreno: <?= $data["release_date"]; ?></p>
        <p>La siguiente es: <?=  $data["following_production"]["title"]; ?></p>

    </hgroup>
</main>

<style>
    :root {
        color-scheme: ligth dark;
    }

    img {
        margin: 0 auto;
    }

    section{
        display: flex;
        justify-content: center;
        text-align: center;
    }

    hgroup{
        display: flex;
        flex-direction: column;
        justify-content: center;
        text-align: center;

    }

    body {
        display: grid;
        place-items: center;
    }
</style>