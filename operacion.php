<?php
require_once("database.php");
require_once("funciones.php");

try {
    $mensaje2 = "";
    //code...
}catch (PDOException $e) {
    echo "ERROR: " . $e->getMessage();
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Produccion</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="css/jquery-ui.min.css">
    <link rel="stylesheet" href="css/timepicker.min.css">
    <link rel="stylesheet" href="css/style.css">
   
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/timepicker.min.js"></script>
    
  <script>
        $(function() {
            $( ".timepicker" ).timepicker({
                timeFormat: 'h:mm p',
                interval: 60,
                minTime: '10',
                maxTime: '6:00pm',
                defaultTime: '11',
                startTime: '10:00',
                dynamic: false,
                dropdown: true,
                scrollbar: true
            });
        } );
  </script>
</head>
<body>
    <div class="frm">
        <h2>Procesar <b>Reserva</b></h2>
        <hr>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" class="form-horizontal" method="post" enctype="multipart/form-data" name="f" autocomplete="off">
            <div class="mb-3">
                <label for="namecli" class="form-label">Nombre</label>
                <input type="text" name="namecli" id="namecli" class="form-control">
            </div>
            <div class="mb-3">
                <label for="reserv" class="form-label">N° Reserva</label>
                <input type="text" name="reserv" id="reserv"class="form-control">
            </div>
            <div class="mb-3">
                <label for="hora_tour" class="form-label">Hora Tour</label>
                <input type="text" name="hora_tour" id="hora_tour" class="timepicker text-left form-control">
            </div>
            <div class="mb-3">
                <label for="trf" class="form-label">TRF</label>
                <input type="text" name="trf" id="trf"class="form-control">
            </div>
            <div class="mb-3">
                <label for="confirm_prov" class="form-label">Confirmación prov</label>
                <input type="text" name="confirm_prov" id="confirm_prov"class="form-control">
            </div>
            <div class="mb-3">
                <label for="transf" class="form-label">Transfer</label>
                <input type="text" name="transf" id="transf"class="form-control">
            </div>
            <hr>
            <div>
            <input type="hidden" name="enviar">
			<button type="submit" class="btn btn-primary" name="login" value="Consultar">Ingresar</button><br><br>
            </div>
        </form>
        <strong id="mensajes"  value="<?php echo $mensaje2; ?>"><?php echo $mensaje2; ?></strong>
    </div> 
</body>
</html>