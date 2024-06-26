<?php

require_once "../Controlador/postulados.controlador.php";
#require_once "";
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Vista Principal</title>

</head>

<body>
    <main>
        <div class="container">
            <div class="tittle text-center" style="margin: 12px;">
                <H1>Bienvenido al portal de postulados</H1>
            </div>
            <br>

            <div class="row text-center">
                <div class="col">
                    <!-- VER TODAS LAS POSTULACIONES -->
                    <h4>Todas las Postulaciones</h4>
                    <a href="postulados.php" class="btn btn-warning btn-md active" role="button" aria-pressed="true">Ver Todos</a>
                </div>

                <div class="col">
                    <!-- VER POSTULADOS POSIBLES -> NO DESCARTADOS -->
                    <h4>Postulados posibles</h4>
                    <a href="postulados.php" class="btn btn-primary btn-md active" role="button" aria-pressed="true">Ver</a>

                </div>

                <div class="col">
                    <!-- VER POSTULADOS DESCARTADOS -->
                    <h4>Postulados descartados</h4>
                    <a href="descartados.php" class="btn btn-danger btn-md active" role="button" aria-pressed="true">Ver</a>
                </div>

                <!-- texto que indique que se pueden cosultar los disitontos tipos de postulados a trabajar con nosotoros -->

                

            </div> <!-- fin row -->

            <br>

            <div class="table">
                <table class="table table-striped table-hover">
                    <!-- ENCABEZADOS DE TABLAS -->
                    <thead>
                        <tr>
                            <th scope="col">TIPO VISTA</th>
                            <th scope="col">NOMBRE</th>
                            <th scope="col">TOTAL POSTULADOS</th>
                            <th scope="col">ACCION</th>
                        </tr>
                    </thead>

                    <tbody class="table-group-divider" id="tabla-cuerpo">
                        <!-- <?php #foreach ($matrizPostulados as $key) { ?> -->  <!-- VERIFICAR -->
                            <tr>
                                <td>Todos</td>
                                <td>Todos los postulados</td>
                                <td> <?php echo $matrizPostuladosTotales ?>  </td>
                                <td>                           
                                    <a href="postulados.php" >
                                        <button type="submit" class="btn btn-primary" data-toggle="modal">VER</button>
                                    </a>    
                                </td>
                            </tr>
                        <?php  # } ?>

                    </tbody>

                    <tbody class="table-group-divider" id="tabla-cuerpo">
                        <!-- <?php #foreach ($matrizPostulados as $key) { ?> -->
                            <tr>
                                <td>Aceptados</td>
                                <td>Postulados pendientes</td>
                                <td> <?php  echo $matrizNoDescartados ?>  </td>

                                <td>                           
                                    <a href="postulados.php" >
                                        <button type="submit" class="btn btn-primary" data-toggle="modal">VER</button>
                                    </a>    
                                </td>
                            </tr>
                        <?php  # } ?>

                    </tbody>

                    <tbody class="table-group-divider" id="tabla-cuerpo">
                        <!-- <?php #foreach ($matrizDescartados as $key) { ?> -->
                            <tr>
                                <td>Descartados</td>
                                <td>Postulados Descartados</td>
                                <td> <?php echo $matrizDescartados ?> </td>
                                <td>                           
                                     <a href="descartados.php">
                                        <button type="submit" class="btn btn-primary" data-toggle="modal">VER</button>
                                    </a>    
                                </td>
                            </tr>
                        <?php  # } ?>

                    </tbody>
                </table>
            </div>
        </div> <!-- fin container -->
    </main>

    <!-- Script Bootstra -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>