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
    </head>
    <body>
        <div id="include"></div>
        <p>
            <label>Verificaciones</label>
        </p>

        <form method="post" action="./verificaciones.php">
            <label>entidad federativa</label>
            <input type="text" id="entidad_federativa" name="entidad_federativa">
            <br>
            <label>municipio</label>
            <input type="text" id="municipio" name="municipio">
            <br>
            <label>numero de centro de verificacion</label>
            <input type="number" id="numero_centro_verificacion" name="numero_centro_verificacion">
            <br>
            <label>numero de linea de verificacion</label>
            <input type="number" id="numero_linea_verificacion" name="numero_linea_verificacion">
            <br>
            <label>id del tecnico verificador</label>
            <input type="number" id="id_tecnico_verificador" name="id_tecnico_verificador">
            <br>
            <label>fecha de expedicion</label>
            <input type="date" id="fecha_expedicion" name="fecha_expedicion">
            <br>
            <label>hora de entrada</label>
            <input type="time" id="hora_entrada" name="hora_entrada">
            <br>
            <label>hora de salida</label>
            <input type="time" id="hora_salida" name="hora_salida">
            <br>
            <label>motivo de la verificacion</label>
            <input type="text" id="motivo_verificacion" name="motivo_verificacion">
            <br>
            <label>folio de certificacion</label>
            <input type="text" id="folio_certificacion" name="folio_certificacion">
            <br>
            <label>semestre</label>
            <input type="number" id="semestre" name="semestre">
            <br>
            <label>fecha de vencimiento</label>
            <input type="date" id="fecha_vencimiento" name="fecha_vencimiento">
            <br>
            <label>id de la tarjeta de circulacion</label>
            <input type="number" id="id_tarjeta_circulacion" name="id_tarjeta_circulacion">
            <br>

            <input type="submit">
        </form>
    </body>
</html>
<?php
    include "../sql_lib.php";

    if(isset($_POST["entidad_federativa"])) {
        $query = "INSERT INTO verificaciones SET";
        foreach ($_POST as $key => $value) {
            if ($key != "id" && $value) {
                $query .= " $key = '$value',";
            }
        }
        $query = rtrim($query, ",");
        $results = RunQuery($query);

        print("<br>$query");
        print("<br>Filas aftectadas: " . $results->affectedRows);
    }