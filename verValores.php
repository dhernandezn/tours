<?php
require_once("database.php");
require_once("funciones.php");

try {
    $dbmysql = Databasemysql::getInstance();

    $view_val = $dbmysql->prepare("SELECT tours.desc_tour as tour, vehiculos.desc_vehiculo as vehiculo, tour_vehiculo.valor as valor 
    FROM `tour_vehiculo`,tours, vehiculos 
    WHERE tour_vehiculo.id_tour = tours.id_tour and vehiculos.id_vehiculo = tour_vehiculo.id_vehiculo;");
    $view_val->execute();

}catch (PDOException $e) {
    echo "ERROR: " . $e->getMessage();
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admnistar Reservas</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="stylesheet" href="css/jquery-ui.min.css">
    <link rel="stylesheet" href="css/timepicker.min.css">
    <link rel="stylesheet" href="css/style.css">

    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/timepicker.min.js"></script>
</head>
<body>
<input type="hidden" name="rut_cli" id="rut_cli" value="">
    <div class="container-xl">
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
                            <a href="ing_valores.php" class="btn btn-danger"><i class="material-icons">analytics</i> <span>Volver</span></a>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Tour</th>
                            <th>Vehículo In</th>
                            <th>Valor</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($resultado = $view_val->fetch(PDO::FETCH_ASSOC)){ ?>
                        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                            <tr>
                                <td></td>
                            
                                <td><?php echo $resultado["tour"]?></td>
                                <td><?php echo $resultado["vehiculo"]?></td>
                                <td><?php echo $resultado["valor"]?></td>
                                
                            </tr>
                        </form>
                        <?php } ?>
                    </tbody>
                </table>
                <div class="clearfix">
                    <div class="hint-text">Mostrando <b>N</b> de <b><?php //echo $res_pg["total_reg"]?></b> entradas</div>
                    <ul class="pagination">
                        <li class="page-item disabled"><a href="#">Anterior</a></li>
                        <li class="page-item active"><a href="#" class="page-link">1</a></li>
                        <li class="page-item"><a href="#" class="page-link">2</a></li>
                        <li class="page-item"><a href="#" class="page-link">3</a></li>
                        <li class="page-item"><a href="#" class="page-link">4</a></li>
                        <li class="page-item"><a href="#" class="page-link">5</a></li>
                        <li class="page-item"><a href="#" class="page-link">Siguiente</a></li>
                    </ul>
                </div>
            </div>
        </div> 
    </div>
</body>
</html>