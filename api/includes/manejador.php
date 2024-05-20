<?php
include_once "conectar.php";
//clase para manejar la base de datos "sistema_laboral"
//para este ejemplo su tabla empresa leer empresa y crear empresa

class DBManejador
{
    public $conn;
    function __construct()
    {
        $db = new DBConnect();
        $this->conn = $db->conectar();
    }

    public function listEmpresa()
    {
        $sql = "SELECT * FROM empresa";
        $reg = mysqli_query($this->conn, $sql);

        $result = [];
        while ($fila=mysqli_fetch_array($reg,MYSQLI_ASSOC)) {
           $result [] = $fila;
        }
        // var_dump($result) ;

        return $result;
    }

    public function SearchByIdEmpresa($id)
    {
        $sql = "SELECT * FROM empresa WHERE id = $id";
        $reg = mysqli_query($this->conn, $sql);

        $result = [];
        while ($fila=mysqli_fetch_array($reg,MYSQLI_ASSOC)) {
           $result [] = $fila;
        }
        // var_dump($result) ;

        return $result;
    }

    public function CreateEmpresa($request)
    {
    }
    public function DeleteEmpresa($id)
    {
    }
}