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
            <label>Oficiales</label>
        </p>

        <Div class="Div1">
            <Div class="Div2">
            </Div>

        <form method="post" action="./oficiales.php" enctype="multipart/form-data" class="CueI">
            
            <Div class="linea"><label class="LabG">nombre</label>
            <input type="text" id="nombre" name="nombre" class="FieG">
            </Div>

            <Div class="linea"><label class="LabG">apellido paterno</label>
            <input type="text" id="apellido_paterno" name="apellido_paterno" class="FieG">
            </Div>

            <Div class="linea"><label class="LabG">apellido materno</label>
            <input type="text" id="apellido_materno" name="apellido_materno" class="FieG">
            </Div>

            <Div class="linea"><label class="LabG">grupo</label>
            <input type="text" id="grupo" name="grupo" class="FieG">
            </Div>

            <Div class="linea"><label class="LabG">firma</label>
            <input type="file" id="firma_file" name="firma_file" class="FieG">
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

    if(isset($_POST["nombre"])) {
        $uploadResult = ProcessUpload($_FILES, "firma_file");
        if ($uploadResult->valid){
            if (move_uploaded_file($uploadResult->urlTemp, $uploadResult->urlTarget)) {
                $_POST["firma"] = $uploadResult->urlTarget;
                $results = InsertArray("oficiales", $_POST, ["id", "firma_file"]);

                print("<br>Filas aftectadas: " . $results->affectedRows);
            } else {
                print("Ha habido un error al cargar tu archivo.");
            }
        } else {
            print($uploadResult->error);
        }
    }
