<!-- Prueba -->
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
            <label>Conductores</label>
        </p>

        <form method="post" action="./conductores.php">
            <label>nombre</label>
            <input type="text" id="nombre" name="nombre">
            <br>
            <label>apellido paterno</label>
            <input type="text" id="apellido_paterno" name="apellido_paterno">
            <br>
            <label>apellido materno</label>
            <input type="text" id="apellido_materno" name="apellido_materno">
            <br>
            <label>domicilio</label>
            <input type="text" id="domicilio" name="domicilio">
            <br>
            <label>fecha nacimiento</label>
            <input type="date" id="fecha_nacimiento" name="fecha_nacimiento">
            <br>
            <label>sexo</label>
            <input type="radio" id="hombre" name="sexo" value="hombre"><label for="hombre">Hombre</label>
            <input type="radio" id="mujer" name="sexo" value="mujer"><label for="mujer">Mujer</label>
            <br>
            <label>firma</label>
            <input type="text" id="firma" name="firma">
            <br>
            <label>numero de emergencia</label>
            <input type="number" id="num_emergencia" name="num_emergencia">
            <br>
            <label>donador</label>
            <input type="checkbox" id="donador" name="donador">
            <br>
            <label>antiguedad</label>
            <input type="date" id="antiguedad" name="antiguedad">
            <br>
            <label>grupo sanguineo</label>
            <select id="grupo_sanguineo" name="grupo_sanguineo">
                <option>A+</option>
                <option>A-</option>
                <option>B+</option>
                <option>B-</option>
                <option>AB+</option>
                <option>AB-</option>
                <option>O+</option>
                <option>O-</option>
            </select>
            <br>
            <label>restricciones</label>
            <input type="text" id="restricciones" name="restricciones">
            <br>

            <input type="submit">
        </form>
    </body>
</html>

<?php
    include "../sql_lib.php";

    if(isset($_POST["nombre"])) {
        $query = "INSERT INTO conductores SET";
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