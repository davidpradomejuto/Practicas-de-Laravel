
<?php
$url_servicio = "http://127.0.0.1:8000/rest";
$curl = curl_init($url_servicio); //establecemos el verbo http que queremos utilizar para la peticion
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$respuesta_curl = curl_exec($curl);
curl_close($curl);
$animales = json_decode($respuesta_curl);

foreach ($animales as $animal) {
    echo ("<p>$animal->especie</p>");
}

?>
