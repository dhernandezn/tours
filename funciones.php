<?php
require_once("database.php");



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
    public function ingresarValResVeh(){
        try {
        $tour = $_POST["tur"];
        $veh =  $_POST["veh"];
        $valor = $_POST["valor"];

        // echo $tour;
        // echo "<br>";
        // echo $veh;
        // echo "<br>";
        // echo $valor;
        $dbmysql = Databasemysql::getInstance();
        $ingresar = $dbmysql-> prepare("INSERT INTO tour_vehiculo (id_tour,id_vehiculo,valor) VALUES (:t_id,:v_id,:v_val)");
        $ingresar->bindValue(':t_id',$tour);
        $ingresar->bindValue(':v_id',$veh);
        $ingresar->bindValue(':v_val',$valor);
        $ingresar->execute();

        $this -> mensaje2 = "<strong>$nombre</strong>";
        } catch (PDOException $e) {
            echo "ERROR: " . $e->getMessage();
        }
        
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
                //exit();	
                $i=1;
        
                foreach($lineas as $linea){
                    $cant_reg = count($lineas);
                    $cant_reg_agr = ($cant_reg - 1);
                    //echo $i;
                    if($i != 0){
                        $datos = explode(",",$linea);
                        // $id_res = $datos[0];
                        // $id_res = intval($id_res);
                        $nom = $datos[0];
                        $nom = utf8_encode($datos[0]);
                        $chin = $datos[1];
                        $chout = $datos[2];
                        $tip_se = $datos[3];
                        $pasaj = $datos[4];
                        $correo = $datos[5];
                        $tel = $datos[6];
                        $r_code = $datos[7];
                        $status = $datos[8];
                        $pack = $datos[9];
                        $cre_by = $datos[10];
                        
                        // echo $id_pep." - ";
                        // echo $rut_pep;
                        // echo $nom_pep;
                        // echo "</br>";
        
                        $cbd = Databasemysql::getInstance();
                        $agrego = $cbd -> prepare("INSERT INTO reservas(nombre,checkin,checkout,tip_serv,pasaj,correo,telef,rate_code,statu,package,cre_by) 
                        VALUES (:v_nom,:v_in,:v_out,:v_tser,:v_pas,:v_corr,:v_tel,:v_cod,:v_sts,:v_pck,:v_scby)");
                        $agrego -> bindValue(':v_nom',$nom);
                        $agrego -> bindValue(':v_in',$chin);
                        $agrego -> bindValue(':v_out',$chout);
                        $agrego -> bindValue(':v_tser',$tip_se);
                        $agrego -> bindValue(':v_pas',$pasaj);
                        $agrego -> bindValue(':v_corr',$correo);
                        $agrego -> bindValue(':v_tel',$tel);
                        $agrego -> bindValue(':v_cod',$r_code);
                        $agrego -> bindValue(':v_sts',$status);
                        $agrego -> bindValue(':v_pck',$pack);
                        $agrego -> bindValue(':v_scby',$cre_by);

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