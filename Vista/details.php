<?php

require_once "view.php";
/* require_once "../Controlador/vista.controlador.php";

$rutas = new ControladorVistas();
$rutas -> inicio(); 
 */

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    <title>Postulados</title>
</head>
<body>
    <main>
        <?php if($datos){} ?>
        <!-- Inicia el contenedor -->
            <div class="container">
                <h4 class="text-center mt-5">Listado de Postulaciones </h4>
                <!-- Tabla nivel 1 -->
                <table class="table table-striped table-hover text-center">
                    <thead>
                      <tr>
                          <th scope="col">ID</th>
                          <th scope="col">Nombre del postulante</th>
                          <th scope="col">Apellidos del postulante</th>
                          <th scope="col">Cargo a ocupar</th>
                          <th scope="col">Estado</th>
                          </tr>
                    </thead>
                    <tbody>
                        
                           <tr>
                            <td><?=$datos["id_persona"] ?></td>
                            <td><?=$datos["nombre_persona"]; ?></td>
                            <td><?=$datos["apellido_persona"]; ?></td>
                            <td>Vinservidor</td>
                            
                            <td>                               
                                <span class="badge bg-success">PENDIENTE</span>
                            </td>

                           </tr>
                    </tbody>
                </table>

                <br>
                <hr>

                <!-- Tabla nivel 2 -->
                <table class="table table-striped table-hover text-center">
                    <thead>
                      <tr>
                          <th scope="col">Documento</th>
                          <th scope="col">Direccion</th>
                          <th scope="col">Email</th>
                          <th scope="col">Telefono</th>
                          <th scope="col">Nacionalidad</th>
                          </tr>
                    </thead>

                    <tbody>
                           <tr>
                            <td><?=$datos["documento_persona"] ?></td>
                            <td><?=$datos["direccion_persona"]; ?></td>
                            <td><?=$datos["correo_persona"]; ?></td>
                            <td><?=$datos["telefono_persona"]; ?></td>
                            <td><?=$datos["nacionalidad_persona"]; ?></td>
                           </tr>
                    </tbody>
                </table>

                <br>
                <hr>

                <!-- Tabla nivel 3 -->
                <table class="table table-striped table-hover text-center">
                    <thead>
                        <tr>
                          <th scope="col">Profesion</th>
                          <th scope="col">Labor Actual</th>
                          <th scope="col">Experiencia</th>
                          <th scope="col">Dato Experiencia</th>
                        </tr>
                    </thead>
                    <tbody>
                           <tr>
                            <td><?=$datos["profesion_persona"] ?></td>
                            <td><?=$datos["labora_actual"]; ?></td>
                            <td><?=$datos["experiencia_repartidor"]; ?></td>
                            <td><?=$datos["experiencia_dato"]; ?></td>
                           </tr>
                        </tbody>
                </table>

                <br>
                <hr>

                <!-- Tabla nivel 4 -->
                <table class="table table-striped table-hover text-center">
                    <thead>
                        <tr>
                          <th scope="col">Disponibilidad</th>
                          <th scope="col">Postulado Tiene Moto</th>
                        </tr>
                    </thead>
                    <tbody>
                           <tr>
                            <td><?=$datos["disponibilidad"] ?></td>
                            <td><?=$datos["tiene_moto"]; ?></td>
                           </tr>
                    </tbody>
                </table>


                <br>
                <hr>

                <div class="row text-center"> <!-- fila para documentos de a 2 columnas -->
                    <div class="col-md-6">
                        <h4>Cedula frontal</h4>
                        <img src="<?=$datos['Cedula_frontal']?>" alt="cedula frontal <?=$datos["nombre_persona"]." ".$datos["apellido_persona"] ?>" srcset="">
                    </div> <!-- fin col -->

                    <div class="col-md-6">
                        <h4>Cedula Posterior</h4>
                        <img src="<?=$datos['cedula_posterior']?>" alt="cedula posterior <?=$datos["nombre_persona"]." ".$datos["apellido_persona"] ?>" srcset="">
                    </div> <!-- fin col -->

                </div><!-- fin row cedula-->

                <div class="row text-center"> <!-- fila para documentos de a 2 columnas -->
                    <div class="col-md-6">
                        <h4>Licencia frontal</h4>
                        <img src="<?=$datos['licencia_frontal']?>" alt="Licencia de Conducción frontal <?=$datos["nombre_persona"]." ".$datos["apellido_persona"] ?>" srcset="">
                    </div> <!-- fin col -->

                    <div class="col-md-6">
                        <h4>Licencia Posterior</h4>
                        <img src="<?=$datos['licencia_posterior']?>" alt="Licencia de Conducción posterior <?=$datos["nombre_persona"]." ".$datos["apellido_persona"] ?>" srcset="">
                    </div> <!-- fin col -->

                </div><!-- fin row -->

                <div class="row text-center"> <!-- fila para documentos de a 2 columnas -->
                    <div class="col-md-6">
                        <h4>Matricula frontal</h4>
                        <img src="<?=$datos['matricula_frontal']?>" alt="Matricula frontal <?=$datos["nombre_persona"]." ".$datos["apellido_persona"] ?>" srcset="">
                    </div> <!-- fin col -->

                    <div class="col-md-6">
                        <h4>Matricula Posterior</h4>
                        <img src="<?=$datos['matricula_posterior']?>" alt="Matricula posterior <?=$datos["nombre_persona"]." ".$datos["apellido_persona"] ?>" srcset="">
                    </div> <!-- fin col -->

                </div><!-- fin row -->

                <div class="row text-center"> <!-- fila para documentos de a 2 columnas -->
                    <div class="col-md-6">
                        <h4>SOAT</h4>
                        <img src="<?=$datos['soat']?>" alt="Poliza Soat <?=$datos["nombre_persona"]." ".$datos["apellido_persona"] ?>" srcset="">
                    </div> <!-- fin col -->

                    <div class="col-md-6">
                        <h4>Revisión Tecnomecanica</h4>
                        <img src="<?=$datos['tecnicomecanica']?>" alt="Revisión Tecnicomecanica <?=$datos["nombre_persona"]." ".$datos["apellido_persona"] ?>" srcset="">
                    </div> <!-- fin col -->

                </div><!-- fin row -->



            </div>
    </main>
    
    <script src="../Vista/js/loading.js"></script>


    <!-- Script Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>


</body>
</html>