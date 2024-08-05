<?php
if(!isset($_SESSION)) 
{session_start();}

include 'functions.php';
include 'curl.php';


// Validacion de los datos no vacios para continuar
if (!empty ($_POST['reference']) && !empty ($_POST['description']) && !empty ($_POST['currency']) && !empty ($_POST['total']) ){

    
// Se invoca la funcion para preparar el JSON en functions.PHP
$json = preparejson($_POST['reference'],$_POST['description'],$_POST['currency'],$_POST['total']);


// Se establesen los parametros con el JSONY y se ejecuta la peticion
curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
$result = curl_exec($ch);
curl_close($ch);


// Se establece la variable de sesion para identificar que hay una transaccion activa
$data = json_decode($result,true);

// si no se presenta error en la peticion visualiza el boton de pago
if ( $data['status']['status'] == 'OK' || $data['status']['status'] == 'PENDING'){
    
// si la peticion fue exitosa se procese a crear la variable de sesion
$_SESSION['requestId'] = $data['requestId'];

!empty ($_SESSION['urlPay']) == true ? : ($_SESSION['urlPay'] = $data['processUrl']);

            // Añadir a log
            $fecha= date('dmY');
            $file = fopen("../logs/reg-$fecha.log", "a");
            fwrite($file, date('d/m/Y h:i A').' | '.$_SESSION['requestId'] .'|'.$_POST['reference']. PHP_EOL);
            fclose($file);
            // Fin añadir a log

include '../payment.php';


}else{
// Se devuelve al inicio si se presenta error en la peticion indicandolo
     echo $data['status']['status'].' | '.$data['status']['message'];
       
    }
    
}else{
// En caso de campos vacios. Existe una sesion que se llama la funcion y se devulve al inicio
 echo campos_vacios();
    
}    
?>