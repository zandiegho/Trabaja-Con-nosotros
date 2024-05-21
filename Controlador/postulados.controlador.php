<?php
require_once "../Modelo/postulados.modelo.php";
require_once "../Vista/view.php";
//require_once "../Vista/inicio.php";

$postulado = new ModeloPostulados();
$matrizPostulados = $postulado->getAllPostulados();
$matrizPostuladosDescartadosView = $postulado->getPostuladosDescartados();
$matrizDescartados = $postulado->countDescartados();
$matrizNoDescartados = $postulado->countNoDescartados();
$matrizPostuladosTotales = $postulado->countPostulados();

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

    public function getNoDescartados(){
        global $matrizNoDescartados;
    }

    public function getPostuladosTotales(){
        global $matrizPostuladosTotales;
    }

    public function getPostDescart(){
        global $matrizPostuladosDescartadosView;
    }

    static public function descartePostulados(){
        $mPostulado = new ModeloPostulados();

        $json = array(
            "Detalle"=>$mPostulado
        );
        
        return;
    }

    static public function viewPostulado($id){
        global $matrizPostulado;
        #$vistas = new Vista();
    }

}

