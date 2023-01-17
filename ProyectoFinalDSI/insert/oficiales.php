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
            <label>Oficiales</label>
        </p>

        <form method="post" action="./oficiales.php">
            <label>nombre</label>
            <input type="text" id="nombre" name="nombre">
            <br>
            <label>apellido paterno</label>
            <input type="text" id="apellido_paterno" name="apellido_paterno">
            <br>
            <label>apellido materno</label>
            <input type="text" id="apellido_materno" name="apellido_materno">
            <br>
            <label>grupo</label>
            <input type="text" id="grupo" name="grupo">
            <br>
            <label>firma</label>
            <input type="text" id="firma" name="firma">
            <br>

            <input type="submit">
        </form>
    </body>
</html>

<?php
    include "../sql_lib.php";

    if(isset($_POST["nombre"])) {
        $query = "INSERT INTO oficiales SET";
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
