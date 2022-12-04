<?php
header('Content-Type: application/json');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//print "Init";
require_once("../config/connexion.php");
require_once("../config/debugger.php");
require_once("../models/Categoria.php");

$categoria=new Categoria();
$body = json_decode(file_get_contents("php://input"),true);

switch($_GET["op"]){

case "GetAll":
  $datos=$categoria->get_categoria();
  echo json_encode($datos);
  break;

case "GetId":
  $datos=$categoria->get_categoria_x_id($body["cat_id"]);
  echo json_encode($datos);
  break;

case "insert":
    $datos=$categoria->insert_categoria($body["cat_num"],$body["cat_obs"]);
    echo json_encode("insertado correctamente");
    break;

  case "update":
      $datos=$categoria->update_categoria($body["cat_id"], $body["cat_num"],$body["cat_obs"]);
      echo json_encode("actualizado correctamente");
      break;
  case "down":
      $datos=$categoria->down_categoria($body["cat_id"]);
      echo json_encode("Categoria desactivada correctamente");
      break;
  case "eliminar":
      $datos=$categoria->delete_categoria($body["cat_id"]);
      echo json_encode("Categoria eliminada correctamente");
      break;

default:
  echo "There is no operation";


}

 ?>
