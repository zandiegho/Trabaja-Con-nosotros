<?php

//header('Content-Type: application/json');

require_once "../Modelo/conexion.php";
require_once "../Modelo/postulados.modelo.php";
require_once "../Controlador/postulados.controlador.php";

require_once "../Vista/index.php";

$postuladoNew = new ModeloPostulados();

$body = json_decode(file_get_contents("php://input"), true);
//$id = $body['id'];

switch($_GET['op']){
    
    case "GetAll":
        $persona = new ControladorPostulados();
        $persona -> index();   

        require_once "../Vista/postulados.php";
    break;
    
    case "descartar":
        $id = $_GET['id'];
        $datos = $postuladoNew->descartar($id);
        #echo json_encode("Actualizado Correctamente");
    break;

    case "no-descartar":
        $id = $_GET['id'];
        $datos = $postuladoNew->NoDescartar($id);
        #echo json_encode("Actualizado Correctamente");
    break;

    case "view":
        $id = $_GET['id'];
        $datos = $postuladoNew->viewDetails($id);
        //echo json_encode($datos);

        include "../Vista/details.php";
        ?> <hr> <?php
        //include "../Vista/postulados.php";
        
    break;

    
}