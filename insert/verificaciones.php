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
            <label>Verificaciones</label>
        </p>

        <Div class="Div1">
            <Div class="Div2">
            </Div>

        <form method="post" action="./verificaciones.php" class="CueI">

            <Div class="linea"><label class="LabG">entidad federativa</label>
            <input type="text" id="entidad_federativa" name="entidad_federativa" class="FieG">
            </Div>

            <Div class="linea"><label class="LabG">municipio</label>
            <input type="text" id="municipio" name="municipio" class="FieG">
            </Div>

            <Div class="linea"><label class="LabG">numero de centro de verificacion</label>
            <input type="number" id="numero_centro_verificacion" name="numero_centro_verificacion" class="FieG">
            </Div>

            <Div class="linea"><label class="LabG">numero de linea de verificacion</label>
            <input type="number" id="numero_linea_verificacion" name="numero_linea_verificacion" class="FieG">
            </Div>

            <Div class="linea"><label class="LabG">id del tecnico verificador</label>
            <input type="number" id="id_tecnico_verificador" name="id_tecnico_verificador" class="FieG">
            </Div>

            <Div class="linea"><label class="LabG">fecha de expedicion</label>
            <input type="date" id="fecha_expedicion" name="fecha_expedicion" class="FieG">
            </Div>

            <Div class="linea"><label class="LabG">hora de entrada</label>
            <input type="time" id="hora_entrada" name="hora_entrada" class="FieG">
            </Div>

            <Div class="linea"><label class="LabG">hora de salida</label>
            <input type="time" id="hora_salida" name="hora_salida" class="FieG">
            </Div>

            <Div class="linea"><label class="LabG">motivo de la verificacion</label>
            <input type="text" id="motivo_verificacion" name="motivo_verificacion" class="FieG">
            </Div>

            <Div class="linea"><label >folio de certificacion</label>
            <input type="text" id="folio_certificacion" name="folio_certificacion" class="FieG">
            </Div>

            <Div class="linea"><label class="LabG">semestre</label>
            <input type="number" id="semestre" name="semestre" class="FieG">
            </Div>

            <Div class="linea"><label class="LabG">fecha de vencimiento</label>
            <input type="date" id="fecha_vencimiento" name="fecha_vencimiento" class="FieG">
            </Div>

            <Div class="linea"><label class="LabG">id de la tarjeta de circulacion</label>
            <input type="number" id="id_tarjeta_circulacion" name="id_tarjeta_circulacion" class="FieG">
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
    include "../utils.php";

    if(isset($_POST["entidad_federativa"])) {
        $results = InsertArray("verificaciones", $_POST, ["id"]);
        print("<br>Filas aftectadas: " . $results->affectedRows);
    }