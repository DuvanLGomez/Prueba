
  // Muestra la informacion del estado

    function consultar_estado(){
        $.ajax({
            url: "./php/consultar_estado.php",
            method: "POST",
            success: function(data){
                $("#estadoactual").html(data)
            }
                
        })
    }