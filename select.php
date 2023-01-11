<html>
    <head>
        <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
        <script>
            window.onload = function(){
                $.get("./navbar_user.php", function(data){
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

        <form method="post" action="./select.php">
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
        foreach ($row as $k => $v) {
            if ($key === 0) {
                $output .= "<th><strong>$k</strong></th>";
            } else {
                $output .= "<td>$v</td>";
            }
        }

        if ($key === 0) {
            $output .= "</tr><tr>";
            $output .= DisplayRow($row, 1, $table);
        }

        return $output;
    }
    if(isset($_POST["select"])) {
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
