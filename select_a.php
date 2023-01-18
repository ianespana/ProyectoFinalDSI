<?php
    session_start();

    if (isset($_SESSION["logged_in_user_id"]) && isset($_SESSION["logged_in_user_admin"]) && $_SESSION["logged_in_user_admin"]) {
?>
<html>
    <head>
        <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
        <script>
            window.onload = function(){
                $.get("./navbar_admin.php", function(data){
                    $("#include").html(data);
                })
            }
        </script>
        <link rel="stylesheet" href="main.css">
        <link rel="stylesheet" href="select.css">
    </head>
    <body>
        <div id="include"></div>

        <div class="container">
            <form class="main-input" method="post" action="./select_a.php">
                <p>
                <h1>Select <?php if (isset($_POST["table"])) echo $_POST["table"]; else echo "conductores" ?></h1>
                </p>

                <input type="text" id="id" name="id" placeholder="ID"
                       value=<?php if (isset($_POST["id"])) echo $_POST["id"] ?>>
                <br>

                <label hidden for="table">Tabla </label>
                <select hidden id="table" name="table">
                    <option <?php if (isset($_POST["table"]) && $_POST["table"] == "conductores") echo "selected" ?>
                            value="conductores">Conductores
                    </option>
                    <option <?php if (isset($_POST["table"]) && $_POST["table"] == "licencias") echo "selected" ?>
                            value="licencias">Licencias
                    </option>
                    <option <?php if (isset($_POST["table"]) && $_POST["table"] == "multas") echo "selected" ?>
                            value="multas">Multas
                    </option>
                    <option <?php if (isset($_POST["table"]) && $_POST["table"] == "oficiales") echo "selected" ?>
                            value="oficiales">Oficiales
                    </option>
                    <option <?php if (isset($_POST["table"]) && $_POST["table"] == "propietarios") echo "selected" ?>
                            value="propietarios">Propietarios
                    </option>
                    <option <?php if (isset($_POST["table"]) && $_POST["table"] == "tarjetas_circulacion") echo "selected" ?>
                            value="tarjetas_circulacion">Tarjetas de Circulación
                    </option>
                    <option <?php if (isset($_POST["table"]) && $_POST["table"] == "vehiculos") echo "selected" ?>
                            value="vehiculos">Vehiculos
                    </option>
                    <option <?php if (isset($_POST["table"]) && $_POST["table"] == "verificaciones") echo "selected" ?>
                            value="verificaciones">Verificaciones
                    </option>
                </select>
                <br>

                <input type="submit" name="select">
            </form>
        </div>
    </body>
</html>

<?php
    } else {
        header("Location:acceso.php");
    }

    include "./sql_lib.php";
    include "./utils.php";

    if(isset($_POST["update"]) && isset($_POST["id"])) {
        $id = $_POST["id"];
        $table = $_POST["table"];
        $query = "UPDATE $table SET";
        foreach ($_POST as $key => $value) {
            if ($key != "id" && $key != "table" && $key != "update" && $value) {
                $query .= " $key = '$value',";
            }
        }
        $query = rtrim($query, ",");

        $query .= " WHERE id = '$id'";
        $results = RunQuery($query);
        print("<br>$query");
        print("<br>Filas aftectadas: " . $results->affectedRows);
    } else if(isset($_POST["delete"]) && isset($_POST["id"])) {
        $id = $_POST["id"];
        $table = $_POST["table"];
        $query = "DELETE FROM $table WHERE id = '$id'";
        $results = RunQuery($query);
        print("Filas aftectadas: " . $results->affectedRows);
    } else if(isset($_POST["select"])) {
        $id = null;
        if (isset($_POST["id"])) {
            $id = $_POST["id"];
        }
        $table = $_POST["table"];

        $query = "SELECT * FROM $table";
        if ($id) {
            $query = "SELECT * FROM $table WHERE id = '$id'";
        }

        $results = RunQuery($query);
        echo DisplayData($results -> result, $table, true);
    }
?>
