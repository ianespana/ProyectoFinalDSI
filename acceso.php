<html class="PriB">

<link rel="stylesheet" href="http://localhost/DSI31/proyecto_final/insert/Diseño.css">

    <body>

    <Div class="Div11">
            <Div class="Div22">
            </Div>
        <form method="post" action="./acceso.php">

            <Div class="linea">
            <label for="username" class="LabG">Usuario </label><input type="text" id="username" name="username" class="FieG">
            </Div>

            <Div class="linea">
            <label for="password" class="LabG">Contrasenia </label><input type="password" id="password" name="password" class="FieG">
            </Div>

            <input type="submit" value="Entrar" class="BotG">

            <Div class="Div2">
            </Div>

        </form>
      </Div>
    </body>
</html>

<?php
    include "./sql_lib.php";

    if (!isset($_POST["username"]) || !isset($_POST["password"])) return;

    $username = $_POST["username"];
    $password = $_POST["password"];

    $query = "SELECT * FROM cuentas WHERE username = '$username'";
    $results = RunQuery($query);
    $n = mysqli_num_rows($results->result);
    if ($n == 0) {
        print("Usuario invalido");
        return;
    }

    $row = mysqli_fetch_row($results->result);
    if ($row[5] == 1) {
        print("Usuario bloqueado");
        return;
    } elseif ($password != $row[1]) {
        print("Contraseña invalida");

        if ($row[4] == 2 && $row[5] != 1) {
            $query = "UPDATE cuentas SET blocked = 1 WHERE username = '$username'";
            print("Usuario bloqueado");
            RunQuery($query);
        }

        $query = "UPDATE cuentas SET tries = tries + 1 WHERE username = '$username'";
        RunQuery($query);

        return;
    } elseif ($row[3] == 0) {
        print("Usuario inactivo");
        return;
    }

    if ($row[4] > 0) {
        $query = "UPDATE cuentas SET tries = 0 WHERE username = '$username'";
        RunQuery($query);
    }

    if ($row[2] == "admin") {
        header("Location:select_a.php");
        return;
    }

    header("Location:select.php");