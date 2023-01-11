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
            <label>Vehiculos</label>
        </p>

        <form method="post" action="./vehiculos.php">
            <label>niv</label>
            <input type="number" id="niv" name="niv">
            <br>
            <label>tipo</label>
            <input type="text" id="tipo" name="tipo">
            <br>
            <label>marca</label>
            <input type="text" id="marca" name="marca">
            <br>
            <label>modelo</label>
            <input type="text" id="modelo" name="modelo">
            <br>
            <label>numero_serie</label>
            <input type="text" id="numero_serie" name="numero_serie">
            <br>
            <label>clase</label>
            <input type="text" id="clase" name="clase">
            <br>
            <label>tipo de combustible</label>
            <input type="text" id="tipo_combustible" name="tipo_combustible">
            <br>
            <label>numero de cilindros</label>
            <input type="text" id="numero_cilindros" name="numero_cilindros">
            <br>
            <label>caballos de fuerza</label>
            <input type="number" id="caballos_fuerza" name="caballos_fuerza">
            <br>
            <label>tipo de carroceria</label>
            <input type="text" id="tipo_carroceria" name="tipo_carroceria">
            <br>
            <label>color</label>
            <input type="text" id="color" name="color">
            <br>
            <label>transmision</label>
            <input type="text" id="transmision" name="transmision">
            <br>
            <label>numero de serie del motor</label>
            <input type="number" id="serie_motor" name="serie_motor">
            <br>
            <label>capacidad</label>
            <input type="text" id="capacidad" name="capacidad">
            <br>

            <input type="submit">
        </form>
    </body>
</html>
<?php
    include "../sql_lib.php";

    if(isset($_POST["niv"])) {
        $query = "INSERT INTO vehiculos SET";
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