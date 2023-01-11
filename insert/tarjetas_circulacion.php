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
            <label>Tarjetas de Circulacion</label>
        </p>

        <form method="post" action="./tarjetas_circulacion.php">
            <label>tipo de servicio</label>
            <input type="text" id="tipo_servicio" name="tipo_servicio">
            <br>
            <label>numero de constancia de inscripcion</label>
            <input type="number" id="numero_constancia_inscripcion" name="numero_constancia_inscripcion">
            <br>
            <label>servicio</label>
            <input type="text" id="servicio" name="servicio">
            <br>
            <label>origen</label>
            <input type="text" id="origen" name="origen">
            <br>
            <label>folio</label>
            <input type="number" id="folio" name="folio">
            <br>
            <label>fecha de vencimiento</label>
            <input type="date" id="fecha_vencimiento" name="fecha_vencimiento">
            <br>
            <label>placa</label>
            <input type="text" id="placa" name="placa">
            <br>
            <label>cve vehicular</label>
            <input type="number" id="cve_vehicular" name="cve_vehicular">
            <br>
            <label>uso</label>
            <input type="text" id="uso" name="uso">
            <br>
            <label>operacion</label>
            <input type="text" id="operacion" name="operacion">
            <br>
            <label>fecha de operacion</label>
            <input type="date" id="fecha_operacion" name="fecha_operacion">
            <br>
            <label>oficina expendidora</label>
            <input type="number" id="oficina_expendidora" name="oficina_expendidora">
            <br>
            <label>movimiento</label>
            <input type="text" id="movimiento" name="movimiento">
            <br>
            <label>rfa</label>
            <input type="number" id="rfa" name="rfa">
            <br>
            <label>id del vehiculo</label>
            <input type="number" id="id_vehiculo" name="id_vehiculo">
            <br>
            <label>id del propietario</label>
            <input type="number" id="id_propietario" name="id_propietario">
            <br>

            <input type="submit">
        </form>
    </body>
</html>
<?php
    include "../sql_lib.php";

    if(isset($_POST["tipo_servicio"])) {
        $query = "INSERT INTO tarjetas_circulacion SET";
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