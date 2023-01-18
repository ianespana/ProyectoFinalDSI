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
            <label>Licencias</label>
        </p>
        <Div class="Div1">
        <form method="post" action="./licencias.php" class="CueI">
        <Div class="Div2">
            </Div>

            <Div class="linea"><label class="LabG">id</label>
            <input type="text" id="id" name="id" class="FieG">
            </Div>

            <Div class="linea"><label class="LabG">tipo</label>
            <select id="tipo" name="tipo" class="FieG">
                <option>A</option>
                <option>B</option>
                <option>C</option>
                <option>D</option>
                <option>PM</option>
            </select>
            </Div>

            <Div class="linea"><label class="LabG">fecha de expedicion</label>
            <input type="date" id="fecha_expedicion" name="fecha_expedicion" class="FieG">
            </Div>

            <Div class="linea"> <label class="LabG">fecha de vencimiento</label>
            <input type="date" id="fecha_vencimiento" name="fecha_vencimiento" class="FieG">
            </Div>

            <Div class="linea"><label class="LabG">atributo desconocido</label>
            <input type="text" id="atributo_desconocido" name="atributo_desconocido" class="FieG">
            </Div>

            <Div class="linea"><label class="LabG">observacion</label>
            <input type="text" id="observacion" name="observacion" class="FieG">
            </Div>

            <Div class="linea"><label class="LabG">id del conductor</label>
            <input type="number" id="id_conductor" name="id_conductor" class="FieG">
            </Div>

            <input type="submit" value="Aceptar" class="BotG">

            <Div class="Div2">
            </Div>

        </form></Div>
    </body>
</html>

<?php
    include "../sql_lib.php";
    include "../utils.php";

    if(isset($_POST["id"])) {
        $results = InsertArray("licencias", $_POST, []);
        print("<br>Filas aftectadas: " . $results->affectedRows);
    }