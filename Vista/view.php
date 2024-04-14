<?php

require_once "../Controlador/postulados.controlador.php";

$arrayRutas = explode("/", $_SERVER['REQUEST_URI']);

//echo "<pre>"; print_r($arrayRutas); echo "<pre>";
$lastArray = end($arrayRutas);
//echo "ultimo elemento del array : $lastArray <br/>";


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

/* if(count(array_filter($arrayRutas))  < 5 ){

    #============================================
    #CUANDO NO SE HACE NINGUNA PETRICION A LA API 
    #============================================
    
    $persona = new ControladorPostulados();
    $persona -> index();    

    $json = array(
        "Detalle" => "NO HAY PETICION ESPECIAL VISTA 1 INDEX"
    );

    echo json_encode($json, true);

    return; 


}else if($lastArray == 'postulados.php'){

    #==========================================
    #CUANDO SE HACE PETICION DESDE POSTULADOS
    #===========================================

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
    
}else{

     $json = array(
        "Detalle" => "Error no Encontrado 2"
    );

    echo json_encode($json, true);

    return; 

} */


?>


