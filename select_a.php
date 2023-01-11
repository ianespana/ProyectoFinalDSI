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
    </head>
    <body>
        <div id="include"></div>

        <p>
            <label>Select <?php if(isset($_POST["table"])) echo $_POST["table"]; else echo "conductores"?></label>
        </p>

        <form method="post" action="./select_a.php">
            <label for="id">ID </label><input type="text" id="id" name="id" value=<?php if(isset($_POST["id"])) echo $_POST["id"]?>>
            <br>

            <label hidden for="table">Tabla </label>
            <select hidden id="table" name="table">
                <option <?php if(isset($_POST["table"]) && $_POST["table"] == "conductores") echo "selected"?> value="conductores">Conductores</option>
                <option <?php if(isset($_POST["table"]) && $_POST["table"] == "licencias") echo "selected"?> value="licencias">Licencias</option>
                <option <?php if(isset($_POST["table"]) && $_POST["table"] == "multas") echo "selected"?> value="multas">Multas</option>
                <option <?php if(isset($_POST["table"]) && $_POST["table"] == "oficiales") echo "selected"?> value="oficiales">Oficiales</option>
                <option <?php if(isset($_POST["table"]) && $_POST["table"] == "propietarios") echo "selected"?> value="propietarios">Propietarios</option>
                <option <?php if(isset($_POST["table"]) && $_POST["table"] == "tarjetas_circulacion") echo "selected"?> value="tarjetas_circulacion">Tarjetas de Circulación</option>
                <option <?php if(isset($_POST["table"]) && $_POST["table"] == "vehiculos") echo "selected"?> value="vehiculos">Vehiculos</option>
                <option <?php if(isset($_POST["table"]) && $_POST["table"] == "verificaciones") echo "selected"?> value="verificaciones">Verificaciones</option>
            </select>
            <br>

            <input type="submit" name="select">
        </form>
    </body>
</html>

<?php
    include "./sql_lib.php";

    function DisplayData(mysqli_result $data, string $table): string
    {
        if ($data->num_rows == 0) return "No se ha encontrado ningun resultado.";

        $row = mysqli_fetch_row($data);

        $output = "<table border='1'>";
        foreach ($data as $key => $var) {
            $output .= "<tr>";
            $output .= DisplayRow($var, $key, $table);
            $output .= "</tr>";
        }

        $output .= "</table>";
        return $output;
    }

    function DisplayRow($row, int $key, string $table): string
    {
        $output = "";
        if ($key !== 0) {
            $output .= "<form action=\"./select_a.php\" method=\"post\">";
            $output .= "<input type=\"hidden\" name=\"table\" value=\"$table\"/>";
        }

        foreach ($row as $k => $v) {
            if ($key === 0) {
                $output .= "<th><strong>" . $k . "</strong></th>";
            } else {
                $output .= "<td>";
                if ($k === "id") {
                    $output .= "<input type=\"hidden\" type=\"text\" id=\"$k\" name=\"$k\" value=\"$v\">$v";
                } else {
                    $output .= "<input type=\"text\" id=\"$k\" name=\"$k\" value=\"$v\">";
                }
                $output .= "</td>";
            }
        }

        if ($key === 0) {
            $output .= "</tr><tr>";
            $output .= DisplayRow($row, 1, $table);
        } else {
            $output .= "<td>";
            $output .= "<input type=\"submit\" name=\"update\" value=\"Update\">";
            $output .= "</td><td>";
            $output .= "<input type=\"submit\" name=\"delete\" value=\"Delete\">";
            $output .= "</td></form>";
        }

        return $output;
    }

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
        echo DisplayData($results -> result, $table);
    }
?>
