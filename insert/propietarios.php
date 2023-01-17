<html class="PriB">
    <head>
        <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
        <script>
            window.onload = function(){
                $.get("../navbar_admin.php", function(data){
                    $("#include").html(data);
                })
            }
        </script>
       <link rel="stylesheet" href="http://localhost/DSI31/proyecto_final/insert/Diseño.css">

    </head>
    <body>
        <div id="include"></div>
        <p class="TitG">
            <label>Propietarios</label>
        </p>

        <Div class="Div1">
            <Div class="Div2">
            </Div>

        <form method="post" action="./propietarios.php">

            <Div class="linea"><label class="LabG">nombre</label>
            <input type="text" id="nombre" name="nombre" class="FieG">
            </Div>

            <Div class="linea"><label class="LabG">apellido paterno</label>
            <input type="text" id="apellido_paterno" name="apellido_paterno" class="FieG">
            </Div>

            <Div class="linea"><label class="LabG">apellido materno</label>
            <input type="text" id="apellido_materno" name="apellido_materno" class="FieG">
            </Div>

            <Div class="linea"><label class="LabG">localidad</label>
            <input type="text" id="localidad" name="localidad" class="FieG">
            </Div>

            <Div class="linea"><label class="LabG">municipio</label>
            <input type="text" id="municipio" name="municipio" class="FieG">
            </Div>

            <Div class="linea"><label class="LabG">rfc</label>
            <input type="text" id="rfc" name="rfc" class="FieG">
            </Div>

            <input type="submit" value="Aceptar" class="BotG">

            <Div class="Div2">
            </Div>

        </form>
        </Div>
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