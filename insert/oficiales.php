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
            <form class="main-input" method="post" action="./oficiales.php" enctype="multipart/form-data">
                <p>
                <h1>Oficiales</h1>
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

                <label>Grupo</label>
                <input type="text" id="grupo" name="grupo" placeholder="Grupo">
                <br>

                <label>Firma</label>
                <input type="file" id="firma_file" name="firma_file" placeholder="Firma">
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
                $results = InsertArray("oficiales", $_POST, ["id", "firma_file"]);

                print("<br>Filas aftectadas: " . $results->affectedRows);
            } else {
                print("Ha habido un error al cargar tu archivo.");
            }
        } else {
            print($uploadResult->error);
        }
    }
