<?php
session_start();
include 'functions.php'; 

$_SESSION['requestId']=$_POST['requestId'];

if (!empty($_SESSION['requestId'])){ header('Location: ./estado.html');}

?>
<html>
    
    <head>
        <link rel="stylesheet" href="./css/styles.css">
        <script src="./js/01.js"> </script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <title>Evertec Place to pay</title>
    </head>
    <body>
        <div id="navbar">
            <img src="https://static.placetopay.com/placetopay-logo.svg" width="250" height="70">
        </div>

    <div class='center'>
        <!--Formulario inicial para realizar la solicitud e iniciar proceso-->
        <form action='consultarprocesos.php' method='post'>
            <label>RequestId:</label>
            <input type='text' name='requestId' class="form-control" required>
            <button class='btn btn-info'>Consultar proceso</button>
        </form>    
    </div>
    <div>
        
    </div>
</html>    