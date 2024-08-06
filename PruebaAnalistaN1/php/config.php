<?php
date_default_timezone_set('America/Bogota');
// Zona Horaria

// Datos para el JSON
$returnUrl = 'https://www.ajedrez21.com/es/59-libros?order=product.date_add.desc';

$login='2d9eaf1e662518756a3d78806543af5b';

$nonce = random_bytes(16);

$seed = date('c');

$secretkey='3YC5brb5eAR4xBGQ';

// Tiempo de Expiracion
$expiration = strtotime ( '+17 minute' , strtotime ($seed) ) ; 
$expiration = date ( 'c' , $expiration); 

// Datos de Usiario
$personal=false; // true - false en caso de false se manda la peticion sencilla  
$document = '1110534441';
$documentType = 'CC';
$name = 'Duvan';
$surname = 'Gomez';
$email = 'duvangomez2218@gmail.com';
$mobile = '3003450875';
?>