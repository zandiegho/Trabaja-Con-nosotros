<?php

//require_once "view.php";

//llamamos solicitud a requerir postulados.controlador
require_once "../Controlador/postulados.controlador.php";

?>

<!-- Documento Tipo HTML -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Trabaja con nosotros</title>
</head>

<body>
    <main>
        <div class="container">

            <h1>Usuarios Descartados</h1>

            <p>
                Aqui esta la lista de los ultimos usuarios Registrados y descartados en la plataforma para trabajar con Vinser.
                <br>
                Puedes utilizar el boton VER para conocer mas el detalle y los documentos del usuarios 
                <br>
                o puedes utilizar el boton volver a incluir para incluirlo nuevamente en la lista de postulados pendientes
            </p>


            <!-- Crear tabla con encabezados -->
            <table class="table table-striped table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">NOMBRE</th>
                        <th scope="col">APELLIDOS</th>
                        <th scope="col">TELEFONO</th>
                        <th scope="col">EXPERIENCIA</th>
                        <th scope="col">TIENE MOTO</th>
                        <th scope="col">DISPONIBILIDAD</th>
                        <th scope="col">ACCIONES</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider" id="tabla-cuerpo">
                    <!-- Crear una fila por cada registro -->
                    <!-- Obtenemos la matriz postulados para pintarla en el HTML -->
                    <?php foreach ($matrizPostuladosDescartadosView as $key) { ?>
                        <tr>
                            <td><?php echo $key['id_persona']; ?></td>
                            <td><?php echo $key['nombre_persona']; ?></td>
                            <td><?php echo $key['apellido_persona']; ?></td>
                            <td><?php echo $key['telefono_persona']; ?></td>
                            <td><?php echo $key['experiencia_repartidor']; ?></td>
                            <td><?php echo $key['tiene_moto']; ?></td>
                            <td><?php echo $key['disponibilidad']; ?></td>
                            
                            <td>
                                <a href="../Controlador/postula.php?op=view&id=<?php echo $key['id_persona']; ?>" >
                                    <button type="submit" class="btn btn-primary" data-toggle="modal">VER</button>
                                </a>
                                
                                <a href="../Controlador/postula.php?op=no-descartar&id=<?php echo $key['id_persona']; ?>" >
                                    <button type="submit" class="btn btn-warning"><i class="fa fa-eye"></i>Volver a Incluir </button>
                                </a>

                            </td>
                        </tr>
                    <?php  } ?>
                </tbody>
            </table>

        </div> <!-- fin .container -->
    </main>

     <!-- Script Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html> 