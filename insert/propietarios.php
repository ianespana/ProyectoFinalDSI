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
            <label>Propietarios</label>
        </p>

        <form method="post" action="./propietarios.php">
            <label>nombre</label>
            <input type="text" id="nombre" name="nombre">
            <br>
            <label>apellido paterno</label>
            <input type="text" id="apellido_paterno" name="apellido_paterno">
            <br>
            <label>apellido materno</label>
            <input type="text" id="apellido_materno" name="apellido_materno">
            <br>
            <label>localidad</label>
            <input type="text" id="localidad" name="localidad">
            <br>
            <label>municipio</label>
            <input type="text" id="municipio" name="municipio">
            <br>
            <label>rfc</label>
            <input type="text" id="rfc" name="rfc">
            <br>

            <input type="submit">
        </form>
    </body>
</html>
<?php
    include "../sql_lib.php";

    if(isset($_POST["nombre"])) {
        $query = "INSERT INTO propietarios SET";
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