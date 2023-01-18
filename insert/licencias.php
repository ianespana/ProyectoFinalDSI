<?php
    session_start();

    if (!(isset($_SESSION["logged_in_user_id"]) || isset($_SESSION["logged_in_user_admin"]) || $_SESSION["logged_in_user_admin"])) {
        header("Location:../acceso.php");
    }

    if(!isset($_POST['id']) ) {
?>
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
            <form class="main-input" method="post" action="./licencias.php">
                <p>
                <h1>Licencias</h1>
                </p>

                <label for="id">ID</label>
                <input type="text" id="id" name="id" placeholder="ID" minlength="10" maxlength="10">
                <br>

                <label for="tipo">Tipo</label>
                <select id="tipo" name="tipo">
                    <option>A</option>
                    <option>B</option>
                    <option>C</option>
                    <option>D</option>
                    <option>PM</option>
                </select>
                <br>

                <label for="fecha_expedicion">Fecha de Expedicion</label>
                <input type="date" id="fecha_expedicion" name="fecha_expedicion">
                <br>

                <label for="fecha_vencimiento">Fecha de Vencimiento</label>
                <input type="date" id="fecha_vencimiento" name="fecha_vencimiento">
                <br>

                <label for="atributo_desconocido">Atributo Desconocido</label>
                <input type="text" id="atributo_desconocido" name="atributo_desconocido"
                       placeholder="Atributo Desconocido">
                <br>

                <label for="observacion">Observacion</label>
                <input type="text" id="observacion" name="observacion" placeholder="Observacion">
                <br>

                <label for="id_conductor">ID del Conductor</label>
                <input type="number" id="id_conductor" name="id_conductor" placeholder="ID del Conductor">
                <br>

                <input type="submit">
            </form>
        </div>
    </body>
</html>

<?php
    }

    include "../sql_lib.php";
    include "../utils.php";

    if(isset($_POST["id"])) {
        $results = InsertArray("licencias", $_POST, []);
        GeneratePDF("licencias", "id", $_POST["id"]);
        print("<br>Filas aftectadas: " . $results->affectedRows);
    }