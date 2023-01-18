<?php
    session_start();

    if (!(isset($_SESSION["logged_in_user_id"]) || isset($_SESSION["logged_in_user_admin"]) || $_SESSION["logged_in_user_admin"])) {
        header("Location:../acceso.php");
    }
?>
<html>
    <head>
        <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
        <script>
            window.onload = function(){
                $.get("../navbar_admin.php", function(data){
                    $("#include").html(data);
                })
            }
        </script>
        <link rel="stylesheet" href="../main.css">
    </head>
    <body>
        <div id="include"></div>

        <div class="container">
            <form class="main-input" method="post" action="./verificaciones.php">
                <p>
                <h1>Verificaciones</h1>
                </p>

                <label>Entidad Federativa</label>
                <input type="text" id="entidad_federativa" name="entidad_federativa" placeholder="Entidad Federativa">
                <br>

                <label>Municipio</label>
                <input type="text" id="municipio" name="municipio" placeholder="Municipio">
                <br>

                <label>Numero de Centro de Verificacion</label>
                <input type="number" id="numero_centro_verificacion" name="numero_centro_verificacion"
                       placeholder="Numero de Centro de Verificacion">
                <br>

                <label>Numero de Linea de Verificacion</label>
                <input type="number" id="numero_linea_verificacion" name="numero_linea_verificacion"
                       placeholder="Numero de Linea de Verificacion">
                <br>

                <label>ID del Tecnico Verificador</label>
                <input type="number" id="id_tecnico_verificador" name="id_tecnico_verificador"
                       placeholder="ID del Tecnico Verificador">
                <br>

                <label>Fecha de Expedicion</label>
                <input type="date" id="fecha_expedicion" name="fecha_expedicion">
                <br>

                <label>Hora de Entrada</label>
                <input type="time" id="hora_entrada" name="hora_entrada">
                <br>

                <label>Hora de Salida</label>
                <input type="time" id="hora_salida" name="hora_salida">
                <br>

                <label>Motivo de la Verificacion</label>
                <input type="text" id="motivo_verificacion" name="motivo_verificacion"
                       placeholder="Motivo de la Verificacion">
                <br>

                <label>Folio de Certificacion</label>
                <input type="text" id="folio_certificacion" name="folio_certificacion"
                       placeholder="Folio de Certificacion">
                <br>

                <label>Semestre</label>
                <input type="number" id="semestre" name="semestre" placeholder="Semestre" min="1" max="2">
                <br>

                <label>Fecha de Vencimiento</label>
                <input type="date" id="fecha_vencimiento" name="fecha_vencimiento" placeholder="Fecha de Vencimiento">
                <br>

                <label>ID de la Tarjeta de Circulacion</label>
                <input type="number" id="id_tarjeta_circulacion" name="id_tarjeta_circulacion"
                       placeholder="ID de la Tarjeta de Circulacion">
                <br>

                <input type="submit">
            </form>
        </div>
    </body>
</html>

<?php
    include "../sql_lib.php";
    include "../utils.php";

    if(isset($_POST["entidad_federativa"])) {
        $results = InsertArray("verificaciones", $_POST, ["id"]);
        print("<br>Filas aftectadas: " . $results->affectedRows);
    }