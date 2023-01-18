<html>
    <head>
        <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
        <link rel="stylesheet" href="main.css">
    </head>
    <body>
        <div class="container">
            <form method="post" action="./acceso.php">
                <p>
                <h1>Iniciar Sesión</h1>
                </p>

                <label for="username">Usuario </label><input type="text" id="username" name="username">
                <br>
                <label for="password">Contraseña </label><input type="password" id="password" name="password">
                <br>

                <input type="submit" value="Login">
            </form>
        </div>
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