<?php 

require_once "conexion.php";

class ModeloPostulados{

    private $db;
    private $persona;
    private $descartado;
    private $postulado;

    public function __construct(){
        
        $this->db=Conexion::conectar();
        $this->persona=array();
        $this->postulado=array();
        
    }

    static public function index($tabla){

        $stmt = Conexion::conectar() -> prepare("SELECT * FROM $tabla");
        $stmt -> execute();

        return $stmt -> fetchAll(PDO::FETCH_CLASS);
        
        $stmt -> closeCursor();

        $stmt = null;
    }

    public function getAllPostulados() {

       #$consulta=$this->db->query("SELECT * FROM persona");
       $consulta=$this->db->query("SELECT p.id_persona, p.nombre_persona, p.apellido_persona, dp.telefono_persona,
       CASE dp.disponibilidad
           WHEN 'AD-AM' THEN 'Algunos días - En la Mañana'
           WHEN 'AD-PM' THEN 'Algunos días - En la tarde'
           WHEN 'AD-N' THEN 'Algunos días - En la noche'
           WHEN 'AD-DP' THEN 'Algunos días - A cualquier hora'
           WHEN 'TD-AM' THEN 'Todos los días - En la mañana'
           WHEN 'TD-PM' THEN 'Todos los días - En la tarde'
           WHEN 'TD-N' THEN 'Todos los días - En la noche'
           WHEN 'TD-DP' THEN 'Todos los días - A cualquier hora'
           WHEN 'FS-AM' THEN 'Solo Fines de Semana - En la mañana'
           WHEN 'FS-PM' THEN 'Solo Fines de Semana - En la Tarde'
           WHEN 'FS-N' THEN 'Solo Fines de Semana - En la Noche'
           WHEN 'FS-DP' THEN 'Solo Fines de Semana - A cualquier hora'
       END AS disponibilidad,
        dp.experiencia_repartidor, dp.tiene_moto
       FROM persona p, datos_persona dp
       WHERE p.id_persona = dp.id_persona;
       AND p.descartado = 'no';");
        
        while($filas=$consulta->fetch(PDO::FETCH_ASSOC)) {
              $this->persona[]=$filas;  
        }

        return $this->persona;
    }

    public function getPostuladosDescartados() {

        $consulta=$this->db->query
        (" SELECT p.id_persona, p.nombre_persona, p.apellido_persona, dp.telefono_persona,
            CASE dp.disponibilidad
                WHEN 'AD-AM' THEN 'Algunos días - En la Mañana'
                WHEN 'AD-PM' THEN 'Algunos días - En la tarde'
                WHEN 'AD-N' THEN 'Algunos días - En la noche'
                WHEN 'AD-DP' THEN 'Algunos días - A cualquier hora'
                WHEN 'TD-AM' THEN 'Todos los días - En la mañana'
                WHEN 'TD-PM' THEN 'Todos los días - En la tarde'
                WHEN 'TD-N' THEN 'Todos los días - En la noche'
                WHEN 'TD-DP' THEN 'Todos los días - A cualquier hora'
                WHEN 'FS-AM' THEN 'Solo Fines de Semana - En la mañana'
                WHEN 'FS-PM' THEN 'Solo Fines de Semana - En la Tarde'
                WHEN 'FS-N' THEN 'Solo Fines de Semana - En la Noche'
                WHEN 'FS-DP' THEN 'Solo Fines de Semana - A cualquier hora'
            END AS disponibilidad,
            dp.experiencia_repartidor, dp.tiene_moto
            FROM persona p, datos_persona dp
            WHERE p.descartado = 'si'
            AND p.id_persona = dp.id_persona; "
        );
         
         while($filas=$consulta->fetch(PDO::FETCH_ASSOC)) {
               $this->descartado[]=$filas;  
         }
 
         return $this->descartado;
     }


    public function descartar($id) {
        try {
            $conectar = Conexion::conectar()->prepare("UPDATE persona SET descartado = 'si' WHERE id_persona = ?");
            $conectar->bindValue(1, $id);
            $conectar->execute();
            
            // Verifica si la consulta se ejecutó correctamente
            if ($conectar->rowCount() > 0) {
                // La consulta se ejecutó con éxito
                #echo "Actualizado Bien";

                echo 
                '<script type="text/javascript">
                    alert("Registrto Descartado");
                    window.location.replace("../Vista/inicio.php");
                </script>';

                return true;
                
            } else {
                // La consulta no afectó filas (posiblemente porque el registro no existía)
                #echo "Registro NO Actualizado";

                echo
                '<script type="text/javascript">
                    alert("Registro NO Actualizado");
                    window.location.replace("postula.php?op=GetAll");                
                </script>';

                return false;
            }
        } catch (PDOException $e) {
            // Manejo de errores en caso de que ocurra una excepción
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function NoDescartar($id) {
        try {
            $conectar = Conexion::conectar()->prepare("UPDATE persona SET descartado = 'no' WHERE id_persona = ?");
            $conectar->bindValue(1, $id);
            $conectar->execute();
            
            // Verifica si la consulta se ejecutó correctamente
            if ($conectar->rowCount() > 0) {
                // La consulta se ejecutó con éxito
                #echo "Actualizado Bien";

                echo 
                '<script type="text/javascript">
                    alert("Registrto Eliminado de los Descartados");
                    window.location.replace("../Vista/inicio.php");
                </script>';

                return true;
                
            } else {
                // La consulta no afectó filas (posiblemente porque el registro no existía)
                #echo "Registro NO Actualizado";

                echo
                '<script type="text/javascript">
                    alert("Registro NO Actualizado");
                    window.location.replace("postula.php?op=GetAll");                
                </script>';

                return false;
            }
        } catch (PDOException $e) {
            // Manejo de errores en caso de que ocurra una excepción
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function viewDetails($id){

        try{

            /* 
                select * 
                from persona p, datos_persona dp, documentos_persona dc
                where p.id_persona = dp.id_persona
                and p.id_persona = dc.id_persona
                and p.id_persona = 11
            */

            $conectar = Conexion::conectar()->prepare("SELECT * 
                                                        from persona p, datos_persona dp, documentos_persona dc
                                                        where p.id_persona = dp.id_persona
                                                        and p.id_persona = dc.id_persona
                                                        and p.id_persona = ?"
            );
            $conectar->bindValue(1, $id);
            $conectar->execute();
            
            // Verifica si la consulta se ejecutó correctamente
            if ($conectar->rowCount() > 0) {
                // La consulta se ejecutó con éxito
                #echo "Actualizado Bien"

                return $conectar->fetch(PDO::FETCH_ASSOC);
                
            } else {
                // La consulta no afectó filas (posiblemente porque el registro no existía)
                #echo "Registro NO Actualizado";

                echo
                '<script type="text/javascript">
                    alert("Registro NO encontrado");    
                </script>';

                return false;
            }


        }


        catch(PDOException $e){
            // Manejo de errores en caso de que ocurra una excepción
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function countDescartados(){
        try{
            // Consulta SQL para obtener los usuarios desactivados
            /*
            SELECT COUNT(*) FROM persona WHERE descartado = 'si';
            */
            $conectar = Conexion::conectar()->prepare(
                'SELECT COUNT(*) FROM persona WHERE descartado = "si";'
            );

            $conectar->execute();
            // Retorna el resultado de la consulta
            return $conectar->fetchColumn();
        
            }catch(PDOException $e){
                // Manejo de errores en caso de que ocurra una excepción
                echo "Error: " . $e->getMessage();
                return false;
            }
    }

    public function countNoDescartados(){
        try{
            // Consulta SQL para obtener los usuarios desactivados
            /*
            SELECT COUNT(*) FROM persona WHERE descartado = 'si';
            */
            $conectar = Conexion::conectar()->prepare(
                'SELECT COUNT(*) FROM persona WHERE descartado = "no";'
            );

            $conectar->execute();
            // Retorna el resultado de la consulta
            return $conectar->fetchColumn();
        
            }catch(PDOException $e){
                // Manejo de errores en caso de que ocurra una excepción
                echo "Error: " . $e->getMessage();
                return false;
            }
    }

    public function countPostulados(){
        try{
            // Consulta SQL para obtener los usuarios desactivados
            /*
            SELECT COUNT(*) FROM persona WHERE descartado = 'si';
            */
            $conectar = Conexion::conectar()->prepare(
                'SELECT COUNT(*) FROM persona'
            );

            $conectar->execute();
            // Retorna el resultado de la consulta
            return $conectar->fetchColumn();
        
            }catch(PDOException $e){
                // Manejo de errores en caso de que ocurra una excepción
                echo "Error: " . $e->getMessage();
                return false;
            }
    }
    

}


