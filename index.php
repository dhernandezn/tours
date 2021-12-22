<?php

require_once("database.php");
require_once("funciones.php");

try {

    $dbmysql = Databasemysql::getInstance();

    $mensaje2 = "";
    if (isset($_POST['enviar'])) {
        
        $model = new Consultas();
        $model -> namecli = htmlspecialchars($_POST["namecli"]);
        $model -> reserv = htmlspecialchars($_POST["reserv"]);
        $model -> checkin = htmlspecialchars($_POST["checkin"]);
        $model -> checkout = htmlspecialchars($_POST["checkout"]);
        $model -> dia_res = htmlspecialchars($_POST["dia_res"]);
        $model -> tur = htmlspecialchars($_POST["tur"]);
       
        $model -> npax = htmlspecialchars($_POST["npax"]);
        $model -> tel = htmlspecialchars($_POST["tel"]);
        $model -> correo = htmlspecialchars($_POST["correo"]);
       
        

        $model -> ingresarReserva();
        $mensaje2 = $model2 -> mensaje2;

    }

    $listar_tour = $dbmysql->prepare("SELECT * FROM tours");
    $listar_tour->execute();
} catch (PDOException $e) {
    echo "ERROR: " . $e->getMessage();
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ingresar Reserva</title>
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
        <h2>Ingresar <b>Reserva</b></h2>
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
            <!-- fecha -->
                <label for="checkin" class="form-label">Check In</label>
                <input type="date" name="checkin" id="checkin" class="form-control" value ="" autocomplete="off">
            </div>
            <!-- fecha -->
            <div class="mb-3">
                <label for="checkout" class="form-label">Check out</label>
                <input type="date" name="checkout" id="checkout"class="form-control">
            </div>
            <div class="mb-3">
                <!-- fecha -->
                <label for="dia_res" class="form-label">Día Reserva</label>
                <input type="date" name="dia_res" id="dia_res"class="form-control">
            </div>
            <div class="mb-3">
                <label for="tour" class="form-label">Tour</label>
                <select name="tur" id="" class="form-control">
                <option value="0" name="tur" id="" class="form-control">Seleccione el Tour</option>
                
                <?php while($res = $listar_tour->fetch(PDO::FETCH_ASSOC)){?>
                
                    <option value="<?php echo $res["id_tour"];?>"><?php echo $res["desc_tour"];?></option>
                <!-- <input type="text" name="tour" id="tour"class="form-control"> -->
                <?php }?>
                </select>
            </div>
            <div class="mb-3">
                <label for="npax" class="form-label">N° de PAX</label>
                <input type="text" name="npax" id="npax"class="form-control">
            </div>
            <div class="mb-3">
                <label for="tel" class="form-label">Fono</label>
                <input type="text" name="tel" id="tel"class="form-control">
            </div>
            <div class="mb-3">
                <label for="correo" class="form-label">Mail</label>
                <input type="email" name="correo" id="correo"class="form-control">
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