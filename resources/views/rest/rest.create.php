<?php
$datos = [
    'especie' => 'Oso Pardo',
    'altura' => 10000,
    'peso' => 210,
    'fechaNacimiento' => '2995-01-01',
    'imagen' => "oso.jpg",
    'alimentation' => 'omnivore',
    'description' => 'El oso Pardo es el gigante entre los carnivoros de la Peninsula iberica'
];

$url_servicio = "http://127.0.0.1:8000/rest/insertar";
$curl = curl_init($url_servicio);
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($curl, CURLOPT_POSTFIELDS, $datos);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$respuesta_curl = curl_exec($curl);
curl_close($curl);

$respuesta_decodificada = json_decode($respuesta_curl);

if (isset($respuesta_decodificada->errors)) {
    var_dump($respuesta_decodificada->errors);
} else {
    echo ($respuesta_decodificada);
}
