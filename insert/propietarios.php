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
            <form class="main-input" method="post" action="./propietarios.php">
                <p>
                <h1>Propietarios</h1>
                </p>

                <label>Nombre</label>
                <input type="text" id="nombre" name="nombre" placeholder="Nombre">
                <br>

                <label>Apellido Paterno</label>
                <input type="text" id="apellido_paterno" name="apellido_paterno" placeholder="Apellido Paterno">
                <br>

                <label>Apellido Materno</label>
                <input type="text" id="apellido_materno" name="apellido_materno" placeholder="Apellido Materno">
                <br>

                <label>Localidad</label>
                <input type="text" id="localidad" name="localidad" placeholder="Localidad">
                <br>

                <label>Municipio</label>
                <input type="text" id="municipio" name="municipio" placeholder="Municipio">
                <br>

                <label>RFC</label>
                <input type="text" id="rfc" name="rfc" placeholder="RFC">
                <br>

                <input type="submit">
            </form>
        </div>
    </body>
</html>

<?php
    include "../sql_lib.php";
    include "../utils.php";

    if(isset($_POST["nombre"])) {
        $results = InsertArray("propietarios", $_POST, ["id"]);
        print("<br>Filas aftectadas: " . $results->affectedRows);
    }