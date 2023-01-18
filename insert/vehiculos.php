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
            <label>Vehiculos</label>
        </p>

        <Div class="Div1">
            <Div class="Div2">
            </Div>

        <form method="post" action="./vehiculos.php">

            <Div class="linea"><label class="LabG">niv</label>
            <input type="number" id="niv" name="niv" class="FieG">
            </Div>     

            <Div class="linea"><label class="LabG">tipo</label>
            <input type="text" id="tipo" name="tipo" class="FieG">
            </Div>     

            <Div class="linea"><label class="LabG">marca</label>
            <input type="text" id="marca" name="marca" class="FieG">
            </Div>     

            <Div class="linea"><label class="LabG">modelo</label>
            <input type="text" id="modelo" name="modelo" class="FieG">
            </Div>     

            <Div class="linea"><label class="LabG">numero_serie</label>
            <input type="text" id="numero_serie" name="numero_serie" class="FieG">
            </Div>     

            <Div class="linea"><label class="LabG">clase</label>
            <input type="text" id="clase" name="clase" class="FieG">
            </Div>     

            <Div class="linea"><label class="LabG">tipo de combustible</label>
            <input type="text" id="tipo_combustible" name="tipo_combustible" class="FieG">
            </Div>     

            <Div class="linea"><label class="LabG">numero de cilindros</label>
            <input type="text" id="numero_cilindros" name="numero_cilindros" class="FieG">
            </Div>     

            <Div class="linea"><label class="LabG">caballos de fuerza</label>
            <input type="number" id="caballos_fuerza" name="caballos_fuerza" class="FieG">
            </Div>     

            <Div class="linea"><label class="LabG">tipo de carroceria</label>
            <input type="text" id="tipo_carroceria" name="tipo_carroceria" class="FieG">
            </Div>     

            <Div class="linea"><label class="LabG">color</label>
            <input type="text" id="color" name="color" class="FieG">
            </Div>     

            <Div class="linea"><label class="LabG">transmision</label>
            <input type="text" id="transmision" name="transmision" class="FieG">
            </Div>     

            <Div class="linea"><label class="LabG">numero de serie del motor</label>
            <input type="number" id="serie_motor" name="serie_motor" class="FieG">
            </Div>     

            <Div class="linea"><label class="LabG">capacidad</label>
            <input type="text" id="capacidad" name="capacidad" class="FieG">
            </Div>     

            <input type="submit" value="aceptar" class="BotG" class="FieG">

            <Div class="Div2">
            </Div>

        </form>
        </Div>
    </body>
</html>

<?php
    include "../sql_lib.php";
    include "../utils.php";

    if(isset($_POST["niv"])) {
        $results = InsertArray("vehiculos", $_POST, ["id"]);
        print("<br>Filas aftectadas: " . $results->affectedRows);
    }