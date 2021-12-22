<?php
//require_once("database.php");

class Consultas
{

    public function ingresarReserva(){
        $nombre = $_POST["namecli"];
        $reserv = $_POST["reserv"];
        $chin = $_POST["checkin"];
        $chout = $_POST["checkout"];
        $dia_res = $_POST["dia_res"];
        $tour = $_POST["tur"];
        $npax = $_POST["npax"];
        $tel = $_POST["tel"];
        $correo = $_POST["correo"];



        echo $nombre;
        echo "<br>";
        echo $reserv;
        echo "<br>";
        echo $chin;
        echo "<br>";
        echo $chout;
        echo "<br>";
        echo $dia_res;
        echo "<br>";
        echo $tour;
        echo "<br>";
        echo $npax;
        echo "<br>";
        echo $tel;
        echo "<br>";
        echo $correo;

        $this -> mensaje2 = "<strong>$nombre</strong>";
        exit();
    }

    public function sub_res(){
        
            try {
                $tipo		= $_FILES["csv_pep"]["type"];
                $tamano		= $_FILES["csv_pep"]["size"];
                $archtmp	= $_FILES["csv_pep"]["tmp_name"];
                $lineas		= file($archtmp);
        
                echo $tipo;echo "</br>";
                echo $tamano;echo "</br>";
                echo $lineas;echo "</br>";
        
                if($tamano != 0){
                    echo "Tiene peso";
        
                }else{
                    echo "No pesa nada";
                }
        exit();	
                $i=1;
        
                foreach($lineas as $linea){
                    $cant_reg = count($lineas);
                    $cant_reg_agr = ($cant_reg - 1);
                    //echo $i;
                    if($i != 0){
                        $datos = explode(";",$linea);
                        $id_pep = $datos[0];
                        $id_pep = intval($id_pep);
                        $rut_pep = $datos[1];
                        $nom_pep = utf8_encode($datos[2]);
                        // echo $id_pep." - ";
                        // echo $rut_pep;
                        // echo $nom_pep;
                        // echo "</br>";
        
                        $cbd = Databasemysql::getInstance();
                        $agrego = $cbd -> prepare("INSERT INTO reservas(pep_id,pep_rut,pep_nombre) VALUES (:v_id,:v_rt,:v_nom)");
                        $agrego -> bindValue(':v_id',$id_pep);
                        $agrego -> bindValue(':v_rt',$rut_pep);
                        $agrego -> bindValue(':v_nom',$nom_pep);
                        $agrego->execute();
                    }
                    $i++;
                }
                if(isset($agrego)){
                    echo "Se han importado correctamente $cant_reg registros.";
                }
                else{
                    echo "Nada para importar";
                }
                // echo "Lineas: ".$cant_reg;
                // echo "Datos: ".$datos;
        
            } catch (PDOException $e) {
                echo "ERROR: " . $e->getMessage();
           }
        
        
    }

}



?>