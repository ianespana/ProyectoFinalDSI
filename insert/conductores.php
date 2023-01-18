<?php
    session_start();

    if (!(isset($_SESSION["logged_in_user_id"]) || isset($_SESSION["logged_in_user_admin"]) || $_SESSION["logged_in_user_admin"])) {
        header("Location:../acceso.php");
    }
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
            <form method="post" action="./conductores.php" enctype="multipart/form-data">
                <p>
                <h1>Conductores</h1>
                </p>

                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" name="nombre" placeholder="Nombre">
                <br>

                <label for="apellido_paterno">Apellido Paterno</label>
                <input type="text" id="apellido_paterno" name="apellido_paterno" placeholder="Apellido Paterno">
                <br>

                <label for="apellido_materno">Apellido Materno</label>
                <input type="text" id="apellido_materno" name="apellido_materno" placeholder="Apellido Materno">
                <br>

                <label for="domicilio">Domicilio</label>
                <input type="text" id="domicilio" name="domicilio" placeholder="Domicilio">
                <br>

                <label for="fecha_nacimiento">Fecha Nacimiento</label>
                <input type="date" id="fecha_nacimiento" name="fecha_nacimiento">
                <br>

                <label>Sexo</label>
                <div>
                    <input type="radio" id="hombre" name="sexo" value="hombre"><label for="hombre">Hombre</label>
                    <input type="radio" id="mujer" name="sexo" value="mujer"><label for="mujer">Mujer</label>
                </div>
                <br>

                <label for="firma">Firma</label>
                <input type="file" id="firma_file" name="firma_file">
                <br>

                <label for="num_emergencia">Numero de Emergencia</label>
                <input type="number" id="num_emergencia" name="num_emergencia" placeholder="Numero de Emergencia" min="10" max="10">
                <br>

                <input type="checkbox" id="donador" name="donador"><label for="donador">Donador</label>
                <br>

                <label for="antiguedad">Antiguedad</label>
                <input type="date" id="antiguedad" name="antiguedad">
                <br>

                <label for="grupo_sanguineo">Grupo Sanguineo</label>
                <select id="grupo_sanguineo" name="grupo_sanguineo">
                    <option>A+</option>
                    <option>A-</option>
                    <option>B+</option>
                    <option>B-</option>
                    <option>AB+</option>
                    <option>AB-</option>
                    <option>O+</option>
                    <option>O-</option>
                </select>
                <br>

                <label for="restricciones">Restricciones</label>
                <input type="text" id="restricciones" name="restricciones" placeholder="Restricciones">
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
        $uploadResult = ProcessUpload($_FILES, "firma_file");
        if ($uploadResult->valid){
            if (move_uploaded_file($uploadResult->urlTemp, $uploadResult->urlTarget)) {
                $_POST["firma"] = $uploadResult->urlRelativeDir;
                print($uploadResult->urlRelativeDir);
                $results = InsertArray("conductores", $_POST, ["id", "firma_file"]);

                print("<br>Filas aftectadas: " . $results->affectedRows);
            } else {
                print("Ha habido un error al cargar tu archivo.");
            }
        } else {
            print($uploadResult->error);
        }
    }