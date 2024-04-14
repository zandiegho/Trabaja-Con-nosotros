<?php
require_once "../Modelo/postulados.modelo.php";
require_once "../Vista/view.php";
require_once "../Vista/inicio.php";

$postulado = new ModeloPostulados();
$matrizPostulados = $postulado->getPostulados();
$matrizDescartados = $postulado->countDescartados();
#$matrizPost = $postulado->viewDetails($id);


class ControladorPostulados{    
   

    public function index(){
        
        $persona = ModeloPostulados::index("persona");
        
        $json = array(
            "detalle"=> $persona
        );
        
        #echo json_encode($json, true);   
        
        return;
    }

    public function getPostulados(){
        global $matrizPostulados;
    }

    public function getDescartados(){
        global $matrizDescartados;
    }

    static public function descartePostulados(){
        $postulado = new ModeloPostulados();
    }

    static public function viwPostulado($id){
        global $matrizPostulado;
        #$vistas = new Vista();
    }

}

