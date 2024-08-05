<?php

include './php/functions.php';
// Se importan las funciones
if (validar()== false){// Se valida si exite una transaccion pendiente
    include 'iniciarproc.html';
    // Si no existe pendiente inicia una nueva transaccion
    
}
else{
    include 'estado.html';
    //En caso de encontrar un proseso existente remitira a ver el estado
}
?>