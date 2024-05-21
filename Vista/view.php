<?php

//llamamos solicitud a requerir postulados.controlador
require_once "../Controlador/postulados.controlador.php";

//evaluamos las rutas y separamos por el caracter /
$arrayRutas = explode("/", $_SERVER['REQUEST_URI']);

//obtenemos el ultimo elemento del array
$lastArray = end($arrayRutas);
//echo "<pre>"; print_r($arrayRutas); echo "<pre>";
//echo "ultimo elemento del array : $lastArray <br/>";

//creamos un switch para dodne se valida el ultimo array
switch ($lastArray){
    
    case "inicio.html":
        $persona = new ControladorPostulados();
        $persona -> index();    

        $json = array(
            "Detalle" => "VISTA 1 INDEX"
        );

        #echo json_encode($json, true);
        return; 

        require_once "index.php";
        break;

    case "postulados.php":
        if (isset($_SERVER['REQUEST_METHOD']) && ($_SERVER['REQUEST_METHOD']) == "GET" ){
        

            $json = array(
                "Detalle" => "Peticion Postulados"
            );
            
            #echo json_encode($json, true);    
            return;
    
            $persona = new ControladorPostulados();
            $persona -> index();   
    
            require_once "postulados.php";
    
        }
        break;

    case "more.php":
        $json = array(
            "Detalle" => "Peticion More"
        );
        
        echo json_encode($json, true);    
        return;
        
        break;

    case "index.php":
        $json = array(
            "Detalle" => "Peticion Index"
        );
        echo json_encode($json, true);    
        return;

        break;
                
}

?>


