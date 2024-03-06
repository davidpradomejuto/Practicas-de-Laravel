<?php
$animal = 'oso-pardo';
$url_servicio = "http://127.0.0.1:8000/rest/$animal/borrar";
$curl = curl_init($url_servicio);
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$respuesta_curl = curl_exec($curl);
$respuesta_decodificada = json_decode($respuesta_curl);
$codigoDeEjecucion = curl_getinfo($curl, CURLINFO_HTTP_CODE);

if ($codigoDeEjecucion >200 & $codigoDeEjecucion <=505) {
    echo ('Error en la ejecucion: '.$codigoDeEjecucion);
} else {
    echo ($respuesta_decodificada);
}
curl_close($curl);
