<?php
if( !isset($_POST['niv']) ) {
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
            <form class="main-input" method="post" action="./vehiculos.php">
                <p>
                <h1>Vehiculos</h1>
                </p>

                <label>NIV</label>
                <input type="number" id="niv" name="niv" placeholder="NIV">
                <br>

                <label>Tipo</label>
                <input type="text" id="tipo" name="tipo" placeholder="Tipo">
                <br>

                <label>Marca</label>
                <input type="text" id="marca" name="marca" placeholder="Marca">
                <br>

                <label>Modelo</label>
                <input type="text" id="modelo" name="modelo" placeholder="Modelo">
                <br>

                <label>Numero de Serie</label>
                <input type="text" id="numero_serie" name="numero_serie" placeholder="Numero de Serie">
                <br>

                <label>Clase</label>
                <input type="text" id="clase" name="clase" placeholder="Clase">
                <br>

                <label>Tipo de Combustible</label>
                <input type="text" id="tipo_combustible" name="tipo_combustible" placeholder="Tipo de Combustible">
                <br>

                <label>Numero de Cilindros</label>
                <input type="text" id="numero_cilindros" name="numero_cilindros" placeholder="Numero de Cilindros" min="2" max="10">
                <br>

                <label>Caballos de Fuerza</label>
                <input type="number" id="caballos_fuerza" name="caballos_fuerza" placeholder="Caballos de Fuerza" min="10" max="5000">
                <br>

                <label>Tipo de Carroceria</label>
                <input type="text" id="tipo_carroceria" name="tipo_carroceria" placeholder="Tipo de Carroceria">
                <br>

                <label>Color</label>
                <input type="text" id="color" name="color" placeholder="Color">
                <br>

                <label>Transmision</label>
                <input type="text" id="transmision" name="transmision" placeholder="Transmision">
                <br>

                <label>Numero de Serie del Motor</label>
                <input type="number" id="serie_motor" name="serie_motor" placeholder="Numero de Serie del Motor">
                <br>

                <label>Capacidad</label>
                <input type="text" id="capacidad" name="capacidad" placeholder="Capacidad">
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

    if(isset($_POST["niv"])) {
        $results = InsertArray("vehiculos", $_POST, ["id"]);
        GeneratePDF("vehiculos", "id", $results->insertId);
        print("<br>Filas aftectadas: " . $results->affectedRows);
    }