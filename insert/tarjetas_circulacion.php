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
            <form class="main-input" method="post" action="./tarjetas_circulacion.php">
                <p>
                <h1>Tarjetas de Circulacion</h1>
                </p>

                <label>Tipo de Servicio</label>
                <input type="text" id="tipo_servicio" name="tipo_servicio" placeholder="Tipo de Servicio">
                <br>

                <label>Numero de Constancia de Inscripcion</label>
                <input type="number" id="numero_constancia_inscripcion" name="numero_constancia_inscripcion"
                       placeholder="Numero de Constancia de Inscripcion">
                <br>

                <label>Servicio</label>
                <input type="text" id="servicio" name="servicio" placeholder="Servicio">
                <br>

                <label>Origen</label>
                <input type="text" id="origen" name="origen" placeholder="Origen">
                <br>

                <label>Folio</label>
                <input type="number" id="folio" name="folio" placeholder="Folio">
                <br>

                <label>Fecha de Vencimiento</label>
                <input type="date" id="fecha_vencimiento" name="fecha_vencimiento">
                <br>

                <label>Placa</label>
                <input type="text" id="placa" name="placa" placeholder="Placa">
                <br>

                <label>CVE Vehicular</label>
                <input type="number" id="cve_vehicular" name="cve_vehicular" placeholder="CVE Vehicular">
                <br>

                <label>Uso</label>
                <input type="text" id="uso" name="uso" placeholder="Uso">
                <br>

                <label>Operacion</label>
                <input type="text" id="operacion" name="operacion" placeholder="Operacion">
                <br>

                <label>Fecha de Operacion</label>
                <input type="date" id="fecha_operacion" name="fecha_operacion" placeholder="Fecha de Operacion">
                <br>

                <label>Oficina Expendidora</label>
                <input type="number" id="oficina_expendidora" name="oficina_expendidora"
                       placeholder="Oficina Expendidora">
                <br>

                <label>Movimiento</label>
                <input type="text" id="movimiento" name="movimiento" placeholder="Movimiento">
                <br>

                <label>RFA</label>
                <input type="number" id="rfa" name="rfa" placeholder="RFA">
                <br>

                <label>ID del Vehiculo</label>
                <input type="number" id="id_vehiculo" name="id_vehiculo" placeholder="ID del Vehiculo">
                <br>

                <label>ID del Propietario</label>
                <input type="number" id="id_propietario" name="id_propietario" placeholder="ID del Propietario">
                <br>

                <input type="submit">
            </form>
        </div>
    </body>
</html>

<?php
    include "../sql_lib.php";
    include "../utils.php";

    if(isset($_POST["tipo_servicio"])) {
        $results = InsertArray("tarjetas_circulacion", $_POST, ["id"]);
        print("<br>Filas aftectadas: " . $results->affectedRows);
    }