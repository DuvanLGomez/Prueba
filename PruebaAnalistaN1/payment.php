<!--Vista dirige al usuario a su pago en PlaceToPay--->
<html>
  <head>
    <title>Proceder a pago</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <link rel="stylesheet" href="../css/styles.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  </head>
  
  <body>
        <div id="navbar">
        <img src="https://static.placetopay.com/placetopay-logo.svg" width="250" height="70">
        </div>
     <div class='center'>
         <h1>Recuerde que:</h1>
         <p>Debe tener disponibles: <br><b> <?=$_POST['total']?> <?=$_POST['currency']?> </b> <br>En su cuenta o tarjeta para realizar el pago.</p>
        <p>Para continuar con el proceso, haga clic en el siguiente botón:</p>
        <button id="open" class='btn btn-success'>Realizar pago</button>
    </div>
   </body>
   
  <!--Script que abre una nueva ventana con el link de pago entregado por PlaceToPay-->
     <script>

      $('#open').click(function(){
            window.location.assign('<?=$_SESSION['urlPay']?>');
      })
     </script> 
    
</html>