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

}



?>