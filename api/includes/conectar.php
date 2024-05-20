<?php
//conectarnos con la base de datos
include_once("config.php");

class DBConnect
{
    public $conexion;
    public function conectar()
    {
        $link = new mysqli(HOST, USUARIO, PASSWORD, NOMBREBD);
        if ($link->connect_errno) {
            echo "Error en la conexion.";
        } else {
            mysqli_query($link, "SET NAMES 'UTF8'");
            mysqli_set_charset($link, "utf8");
            date_default_timezone_set("America/Lima");
            $this->conexion = $link;
            return $this->conexion;
        }
    }
}

// $conn = new DBConnect;
// $mc = $conn->conectar();