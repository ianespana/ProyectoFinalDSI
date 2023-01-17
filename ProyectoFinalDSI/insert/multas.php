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
            <label>Multas</label>
        </p>

        <form method="post" action="./multas.php">
            <label>folio</label>
            <input type="text" id="id" name="id">
            <br>
            <label>dia</label>
            <input type="number" id="dia" name="dia">
            <br>
            <label>mes</label>
            <input type="number" id="mes" name="mes">
            <br>
            <label>anio</label>
            <input type="number" id="anio" name="anio">
            <br>
            <label>hora</label>
            <input type="time" id="hora" name="hora">
            <br>
            <label>reporte de seccion</label>
            <input type="text" id="reporte_seccion" name="reporte_seccion">
            <br>
            <label>nombre de la via</label>
            <input type="text" id="nombre_via" name="nombre_via">
            <br>
            <label>kilometro</label>
            <input type="number" id="kilometro" name="kilometro">
            <br>
            <label>direccion o sentido</label>
            <input type="text" id="direccion_sentido" name="direccion_sentido">
            <br>
            <label>municipio</label>
            <input type="text" id="municipio" name="municipio">
            <br>
            <label>referencia del lugar</label>
            <input type="text" id="referencia_lugar" name="referencia_lugar">
            <br>
            <label>articulo o fundamento</label>
            <input type="text" id="articulo_fundamento" name="articulo_fundamento">
            <br>
            <label>motivo</label>
            <input type="text" id="motivo" name="motivo">
            <br>
            <label>garantia retenida</label>
            <input type="text" id="garantia_retenida" name="garantia_retenida">
            <br>
            <label>convenio</label>
            <input type="text" id="convenio" name="convenio">
            <br>
            <label>puesto a disposicion</label>
            <input type="checkbox" id="puesto_a_disposicion" name="puesto_a_disposicion">
            <br>
            <label>calificacion boleta</label>
            <input type="text" id="calificacion_boleta" name="calificacion_boleta">
            <br>
            <label>deposito oficial</label>
            <input type="text" id="deposito_oficial" name="deposito_oficial">
            <br>
            <label>observaciones del personal operativo</label>
            <input type="text" id="observaciones_personal_operativo" name="observaciones_personal_operativo">
            <br>
            <label>observaciones del conductor</label>
            <input type="text" id="observaciones_conductor" name="observaciones_conductor">
            <br>
            <label>numero de parte del accidente</label>
            <input type="number" id="numero_parte_accidente" name="numero_parte_accidente">
            <br>
            <label>id del personal operativo</label>
            <input type="number" id="id_personal_operativo" name="id_personal_operativo">
            <br>
            <label>id de la tarjeta de circulacion</label>
            <input type="number" id="id_tarjeta_circulacion" name="id_tarjeta_circulacion">
            <br>
            <label>id de la licencia</label>
            <input type="text" id="id_licencia" name="id_licencia">
            <br>
            <label>id del vehiculo</label>
            <input type="number" id="id_vehiculo" name="id_vehiculo">
            <br>

            <input type="submit">
        </form>
    </body>
</html>
<?php
    include "../sql_lib.php";

    if(isset($_POST["id"])) {
        $query = "INSERT INTO multas SET";
        foreach ($_POST as $key => $value) {
            $query .= " $key = '$value',";
        }
        $query = rtrim($query, ",");
        $results = RunQuery($query);

        print("<br>$query");
        print("<br>Filas aftectadas: " . $results->affectedRows);
    }