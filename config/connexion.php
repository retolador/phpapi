<?php
require_once("../config/debugger.php");
class Conectar{

  protected $dbh;

  protected function Conexion(){


    try{
      $servername = "localhost";
      $username = "sammy";
      $password = "Password123@";

      try {
        $conn = new PDO("mysql:host=$servername;dbname=phpapi", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //debug_to_console("Connected successfully");
        //print "Connected successfully";
        } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        }
        //$conectar=$this->dbh=new PDU("mysql:local=localhost;dbname=phpapi", "root" , "");
        //return $conectar;
        return $conn;

    }catch(Exception $e){

      echo "!error DB;".$e->getMessage()."<br/>";

      die();
    }
  }


  public function set_name(){
    return $this->dbh->query("SET NAMES 'utf8'");

  }

}








 ?>
