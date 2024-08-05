<?php
if(!isset($_SESSION)) 
{session_start();}

 // Validacion de sesion activa
function validar(){
    if (!empty($_SESSION['requestId'])){
          return true;   
    }
    else {
        return false;
    }
    
}

// Prepara el JSON para iniciar una sesion

function preparejson($reference,$description,$currency,$total){

    include 'config.php';

    $secret = base64_encode(sha1($nonce.$seed.$secretkey,true));
    $nonce64 = base64_encode($nonce);
    
        $json = '{
              "locale": "es_CO",
              "auth": {
                "login": "'.$login.'",
                "tranKey": "'.$secret.'",
                "nonce": "'.$nonce64.'",
                "seed": "'.$seed.'"
              },
          "payment": {
                "reference": "'.$reference.'",
                "description": "'.$description.'",
                "amount": {
                  "currency": "'.$currency.'",
                  "total": '.$total.'
            }
          },'; 
          // Datos personales
          if ($personal == true && !empty($personal)){
          $json = $json.'"payer": {
            "document": "'.$document.'",
            "documentType": "'.$documentType.'",
            "name": "'.$name.'",
            "surname": "'.$surname.'",
            "email": "'.$email.'",
            "mobile": "+57'.$mobile.'"
            },'; 
        }
        $json= $json.
        '"expiration": "'.$expiration.'",
          "returnUrl": "'.$returnUrl.'",
          "ipAddress": "127.0.0.1",
          "userAgent": "PlacetoPay Sandbox"
          
        }';

         
return $json;
}


// Preparar el JSON para una consulta
function preparejsonconsulta(){
    
    include 'config.php';
    
    $secret = base64_encode(sha1($nonce.$seed.$secretkey,true));
    $nonce64 = base64_encode($nonce);
        $json = '{
              "auth": {
                "login": "'.$login.'",
                "tranKey": "'.$secret.'",
                "nonce": "'.$nonce64.'",
                "seed": "'.$seed.'"
              }
            }';
    return $json;
}
 
// Devuelve al inicio en caso de presentar error al crear la peticion 
function error_procesar($message){
    $err='
        <script>
        alert("Se ha presentado un error intente nuevamente: \n\r '.$message.'");
        setTimeout(location.href="../",10000);
        </script>
    ';
    return $err;
}    

// Devuelve al inicio en caso de presentar campos vacios al crear la peticion  
function campos_vacios(){
    $err='
        <script>
        alert("Datos incompletos diligencie de nuevo");
        setTimeout(location.href="../",8000);
        </script>
    ';
    return $err;
} 
?>