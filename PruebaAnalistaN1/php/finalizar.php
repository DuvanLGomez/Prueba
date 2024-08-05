<?php
if(!isset($_SESSION)) 
{session_start();}

// Se eliminan las variables de sesion usadas
unset($_SESSION['requestId']);
unset($_SESSION['urlPay']);

// Luego volvemos a la ventana de inicio
?>
<script>
window.location.replace("../");
</script>