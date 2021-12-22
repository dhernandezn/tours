<?php
require_once('database.php');
require_once("funciones.php");
try {

    //llenador de tabla
    $cbd = Databasemysql::getInstance();
    
$mensaje = null;

if (isset($_POST['insertar'])) {
	$model = new Consultas();
	$model -> csv_pep = htmlspecialchars($_POST["csv_pep"]);
	$model -> sub_res();
	$mensaje = $model -> mensaje; 

}

} catch (PDOException $e) {
    echo "ERROR: " . $e->getMessage();
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cargar Reservas</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="css/font-awesome.css">
	<link rel="stylesheet" href="css/style.css">

	<script src="js/jquery.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.4.5.0.js"></script>
	<script src="js/js.js"></script>
    
    <script>
    function cap(){
        var a = '0';
			a = document.getElementById("val1").value;
			//b = document.getElementById("valu1").value;
			console.log(a);
            //mirar();
			switch (a) {
				case '1':
					$("#editar_entrada").modal({backdrop:'static',keyboard:false});
                       
                    console.log("AUTOEX");
					break;
				default:
					break;
			}
    };
    </script>
    <script>
		window.onload=cap;
	</script>
</head>
<body>
<strong id="mensajes" value=""><?php echo $mensaje3; ?></strong>
<input type="hidden" name="rut_cli" id="rut_cli" value="">
    <div class="container-xxl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2>Importar <b>Archivos</b></h2>
                        <?php echo $resultado[""];?>
                        </div>
                        <div class="col-sm-6">
                            <!-- <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Añadir nuevo colegio</span></a>-->
                            <!-- <a href="show_all.php" class="btn btn-danger"><i class="material-icons">analytics</i> <span>Todos</span></a> -->
                            <a href="index.php" class="btn btn-danger"><i class="material-icons">analytics</i> <span>Volver</span></a>
                            <!-- <a href="subir.php" class="btn btn-danger"><i class="material-icons">analytics</i> <span>Importar</span></a> -->
                        </div>
                    </div>
                </div>
                <form action="<?php echo $_SERVER['PHP_SELF'];?>" class="form-horizontal" method="post" enctype="multipart/form-data" name="f" autocomplete="off">
                <label for="file-input"><span>Seleccionar Archivo CSV para reservas...</span></label><br>
                    <input type="file" name="csv_pep" id="file-input" accept=".csv" required>
                    
                    
                    <div class="#">
                        <input type="hidden" name="insertar"><hr>
                        <input type="submit" class="boton_cons" onclick="checkRut()" name="login" value="Subir"><br><br>
                        <!--<strong><?php //echo $mensaje; ?></strong>-->
                            
                    </div>
			    </form>
            </div>
        </div> 
    </div>
   
</body>
</html>