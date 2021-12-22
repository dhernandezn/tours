<?php
require_once("database.php");
require_once("funciones.php");

try {
    $dbmysql = Databasemysql::getInstance();
    $mensaje2 = "";

    $listar_vehiculos = $dbmysql->prepare("SELECT * FROM vehiculos");
    $listar_vehiculos->execute();

    $listar_tour = $dbmysql->prepare("SELECT * FROM tours");
    $listar_tour->execute();

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
<input type="hidden" name="rut_cli" id="rut_cli" value="">
    <div class="container-xxl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2>Administrar <b>Reservas</b></h2>
                        <?php 
                        // echo $resultado[""];
                        ?>
                        </div>
                        <div class="col-sm-6">
                            <!-- <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Añadir nuevo colegio</span></a>-->
                            <a href="operacion.php" class="btn btn-danger"><i class="material-icons">analytics</i> <span>Operacion</span></a>
                            <a href="index.php" class="btn btn-danger"><i class="material-icons">analytics</i> <span>Volver</span></a>
                        </div>
                    </div>
                </div>
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
                <label for="checkin" class="form-label">Check in</label>
                <input type="text" name="checkin" id="checkin"class="form-control">
            </div>
            <div class="mb-3">
                <label for="checkout" class="form-label">Check out</label>
                <input type="text" name="checkout" id="checkout"class="form-control">
            </div>
            <div class="mb-3">
                <!-- fecha -->
                <label for="f_tour" class="form-label">Fecha Reserva Tour</label>
                <input type="date" name="f_tour" id="f_tour"class="form-control">
            </div>
            <div class="mb-3">
                <label for="tur" class="sr-only">Tour</label>
                <select name="tur" id="tur" class="form-control mb-2 mr-sm-2">
                    <option value="0" name="tur" id="tur" class="form-control">Seleccione el Tour</option>
                    
                        <?php while($res = $listar_tour->fetch(PDO::FETCH_ASSOC)){?>
                    
                        <option value="<?php echo $res["id_tour"];?>"><?php echo $res["desc_tour"];?></option>
                    <!-- <input type="text" name="tour" id="tour"class="form-control"> -->
                    <?php }?>
                </select>
            </div>
            <div class="mb-3">
                <label for="hora_tour" class="form-label">Hora Tour</label>
                <input type="text" name="hora_tour" id="hora_tour" class="timepicker text-left form-control">
            </div>
            <div class="mb-3">
                <label for="v_tour" class="form-label">Valor Tour</label>
                <input type="text" name="v_tour" id="v_tour"class="form-control">
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
            <div class="mb-3">
                <label for="trasl" class="form-label">Traslado</label>
                <input type="text" name="trasl" id="trasl"class="form-control">
            </div>
            <div class="mb-3">
                <label for="conduc" class="form-label">Conductor</label>
                <input type="text" name="conduc" id="conduc"class="form-control">
            </div>
            <div class="mb-3">
                <label for="veh" class="form-label">Vehículo</label>
                <select name="veh" id="veh" class="form-control">
                <option value="0" name="veh" id="veh" class="form-control">Seleccione el Vehiculo</option>
                
                <?php while($res = $listar_vehiculos->fetch(PDO::FETCH_ASSOC)){?>
                
                    <option value="<?php echo $res["id_vehiculo"];?>"><?php echo $res["desc_vehiculo"];?></option>
                <!-- <input type="text" name="tour" id="tour"class="form-control"> -->
                <?php }?>
                </select>
            </div>
            <div class="mb-3">
                <label for="val_vt" class="form-label">Valor Vehículo-Tour</label>
                <input type="text" name="val_vt" id="val_vt"class="form-control">
            </div>
            <hr>
            <div>
            <input type="hidden" name="enviar">
			<button type="submit" class="btn btn-primary" name="login" value="Consultar">Ingresar</button><br><br>
            </div>
        </form>
        <strong id="mensajes"  value="<?php echo $mensaje2; ?>"><?php echo $mensaje2; ?></strong>
    </div> 
    </div>
    </div>
    </div>
</body>
</html>