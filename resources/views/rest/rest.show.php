<?php
$url_servicio = "http://127.0.0.1:8000/rest/jirafa";
$curl = curl_init($url_servicio); //establecemos el verbo http que queremos utilizar para la peticion
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$respuesta_curl = curl_exec($curl);
curl_close($curl);
$animal = json_decode($respuesta_curl);
$codigoDeEjecucion = curl_getinfo($curl, CURLINFO_HTTP_CODE);

if ($codigoDeEjecucion > 200 & $codigoDeEjecucion <= 505) {
    echo ('Error en la ejecucion: ' . $codigoDeEjecucion);
} else {
    echo $animal->especie . "<br/>";
    echo $animal->altura . "<br/>";
    echo $animal->peso . "<br/>";
    echo $animal->alimentacion . "<br/>";
    echo $animal->descripcion . "<br>";
}
