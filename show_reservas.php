<?php
require_once("database.php");
require_once("funciones.php");

try {
    $dbmysql = Databasemysql::getInstance();

    $view_rsv = $dbmysql->prepare("SELECT * FROM reservas ORDER BY id_res DESC");
    $view_rsv->execute();

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
                            <a href="show_all.php" class="btn btn-danger"><i class="material-icons">analytics</i> <span>Todos</span></a>
                            <a href="index.php" class="btn btn-danger"><i class="material-icons">analytics</i> <span>Volver</span></a>
                            <a href="subir.php" class="btn btn-danger"><i class="material-icons">analytics</i> <span>Importar</span></a>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Nombre</th>
                            <th>Reserva</th>
                            <th>Check In</th>
                            <th>Check Out</th>
                            <th>Tour</th>
                            <th>N° PAX</th>
                            <th>Email</th>
                            <th>Tel</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($resultado = $view_rsv->fetch(PDO::FETCH_ASSOC)){ ?>
                        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                            <tr>
                                <td></td>
                            
                                <td><?php echo $resultado["rut_ingre"]?></td>
                                <td><?php echo $resultado["fecha"]?></td>
                                <td><?php echo $resultado["hora"]?></td>
                                <td><input type="text" class="form-control" name="n_entrada" id="n_entrada" value="<?php echo $resultado["n_entrada"]?>" required></td>
                                <td style="display:none;"><input type="hidden" name="id_" id="id_" value="<?php echo $resultado["id_log"]?>"><?php echo $resultado["id_log"]?></td>
                                <td>
                                    <input type="hidden" name="insertar3">
                                    <input type="submit" value="&#xE254;" class="material-icons">
                                </td>
                            </tr>
                        </form>
                        <?php } ?>
                    </tbody>
                </table>
                <div class="clearfix">
                    <div class="hint-text">Mostrando <b>5</b> de <b><?php //echo $res_pg["total_reg"]?></b> entradas</div>
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