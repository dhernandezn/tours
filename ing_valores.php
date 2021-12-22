<?php

require_once("database.php");
require_once("funciones.php");

try {

    $dbmysql = Databasemysql::getInstance();

    $mensaje2 = "";
    if (isset($_POST['enviar'])) {
        
        $model = new Consultas();
        $model -> tur = htmlspecialchars($_POST["tur"]);
        $model -> veh = htmlspecialchars($_POST["veh"]);
        $model -> valor = htmlspecialchars($_POST["valor"]);
        
        $model -> ingresarValResVeh();
        $mensaje2 = $model2 -> mensaje2;

    }

    $listar_tour = $dbmysql->prepare("SELECT * FROM tours");
    $listar_tour->execute();

    $listar_vehiculos = $dbmysql->prepare("SELECT * FROM vehiculos");
    $listar_vehiculos->execute();

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
    <title>Ingresar Valores Tour Vehículo</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="css/jquery-ui.min.css">
    <link rel="stylesheet" href="css/timepicker.min.css">
    <link rel="stylesheet" href="css/style.css">
   
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/timepicker.min.js"></script>
    
</head>
<body>
    <div class="frm-ingreso-val">
        <h2>Ingresar valores <b>Tour - Vehiculos</b></h2>
        <a href="verValores.php">Ver Valores ya Ingresados</a>
        <hr>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" class="form-inline" method="post" enctype="multipart/form-data" name="f" autocomplete="off">
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
                <!-- fecha -->
                <label for="valor" class="form-label">Ingrese el Valor</label>
                <input type="text" name="valor" id="valor"class="form-control">
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