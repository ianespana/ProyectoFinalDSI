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
    </head>
    <body>
        <div id="include"></div>
        <p>
            <label>Licencias</label>
        </p>

        <form method="post" action="./licencias.php">
            <label>id</label>
            <input type="text" id="id" name="id">
            <br>
            <label>tipo</label>
            <select id="tipo" name="tipo">
                <option>A</option>
                <option>B</option>
                <option>C</option>
                <option>D</option>
                <option>PM</option>
            </select>
            <br>
            <label>fecha de expedicion</label>
            <input type="date" id="fecha_expedicion" name="fecha_expedicion">
            <br>
            <label>fecha de vencimiento</label>
            <input type="date" id="fecha_vencimiento" name="fecha_vencimiento">
            <br>
            <label>atributo desconocido</label>
            <input type="text" id="atributo_desconocido" name="atributo_desconocido">
            <br>
            <label>observacion</label>
            <input type="text" id="observacion" name="observacion">
            <br>
            <label>id del conductor</label>
            <input type="number" id="id_conductor" name="id_conductor">
            <br>

            <input type="submit">
        </form>
    </body>
</html>

<?php
    include "../sql_lib.php";

    if(isset($_POST["id"])) {
        $query = "INSERT INTO licencias SET";
        foreach ($_POST as $key => $value) {
            $query .= " $key = '$value',";
        }
        $query = rtrim($query, ",");
        $results = RunQuery($query);

        print("<br>$query");
        print("<br>Filas aftectadas: " . $results->affectedRows);
    }