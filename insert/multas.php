<?php
    session_start();

    if (isset($_SESSION["logged_in_user_id"]) && isset($_SESSION["logged_in_user_admin"]) && $_SESSION["logged_in_user_admin"]) {
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
            <form class="main-input" method="post" action="./multas.php">
                <p>
                <h1>Multas</h1>
                </p>

                <label for="id">Folio</label>
                <input type="text" id="id" name="id" placeholder="Folio">
                <br>

                <label for="dia">Dia</label>
                <input type="number" id="dia" name="dia" placeholder="Dia" min="1" max="31">
                <br>

                <label>Mes</label>
                <input type="number" id="mes" name="mes" placeholder="Mes" min="1" max="12">
                <br>

                <label>Anio</label>
                <input type="number" id="anio" name="anio" placeholder="Anio" min="1997" max="2100">
                <br>

                <label>Hora</label>
                <input type="time" id="hora" name="hora">
                <br>

                <label>Reporte de Seccion</label>
                <input type="text" id="reporte_seccion" name="reporte_seccion" placeholder="Reporte de Seccion">
                <br>

                <label>Nombre de la Via</label>
                <input type="text" id="nombre_via" name="nombre_via" placeholder="Nombre de la Via">
                <br>

                <label>kilometro</label>
                <input type="number" id="kilometro" name="kilometro" placeholder="Kilometro">
                <br>

                <label>Direccion o Sentido</label>
                <input type="text" id="direccion_sentido" name="direccion_sentido" placeholder="Apellido Materno">
                <br>

                <label>Municipio</label>
                <input type="text" id="municipio" name="municipio" placeholder="Municipio">
                <br>

                <label>Referencia del Lugar</label>
                <input type="text" id="referencia_lugar" name="referencia_lugar" placeholder="Referencia del Lugar">
                <br>

                <label>Articulo o Fundamento</label>
                <input type="text" id="articulo_fundamento" name="articulo_fundamento" placeholder="Apellido Materno">
                <br>

                <label>Motivo</label>
                <input type="text" id="motivo" name="motivo" placeholder="Motivo">
                <br>

                <label>Garantia Retenida</label>
                <input type="text" id="garantia_retenida" name="garantia_retenida" placeholder="Garantia Retenida">
                <br>

                <label>Convenio</label>
                <input type="text" id="convenio" name="convenio" placeholder="Convenio">
                <br>

                <input type="checkbox" id="puesto_a_disposicion" name="puesto_a_disposicion"><label>Puesto a Disposicion</label>
                <br>

                <label>Calificacion Boleta</label>
                <input type="number" id="calificacion_boleta" name="calificacion_boleta"
                       placeholder="Calificacion Boleta">
                <br>

                <label>Deposito Oficial</label>
                <input type="text" id="deposito_oficial" name="deposito_oficial" placeholder="Deposito Oficial">
                <br>

                <label>Observaciones del Personal Operativo</label>
                <input type="text" id="observaciones_personal_operativo" name="observaciones_personal_operativo"
                       placeholder="Observaciones del Personal Operativo">
                <br>

                <label>Observaciones del Conductor</label>
                <input type="text" id="observaciones_conductor" name="observaciones_conductor"
                       placeholder="Observaciones del Conductor">
                <br>

                <label>Numero de Parte del Accidente</label>
                <input type="number" id="numero_parte_accidente" name="numero_parte_accidente"
                       placeholder="Numero de Parte del Accidente">
                <br>

                <label>ID del Personal Operativo</label>
                <input type="number" id="id_personal_operativo" name="id_personal_operativo"
                       placeholder="ID del Personal Operativo">
                <br>

                <label>ID de la Tarjeta de Circulacion</label>
                <input type="number" id="id_tarjeta_circulacion" name="id_tarjeta_circulacion"
                       placeholder="ID de la Tarjeta de Circulacion">
                <br>

                <label>ID de la Licencia</label>
                <input type="text" id="id_licencia" name="id_licencia" placeholder="ID de la Licencia">
                <br>

                <label>ID del Vehiculo</label>
                <input type="number" id="id_vehiculo" name="id_vehiculo" placeholder="ID del Vehiculo">
                <br>

                <input type="submit">
            </form>
        </div>
    </body>
</html>

<?php
    } else {
        header("Location:../acceso.php");
    }

    include "../sql_lib.php";
    include "../utils.php";

    if(isset($_POST["id"])) {
        $results = InsertArray("multas", $_POST, []);
        print("<br>Filas aftectadas: " . $results->affectedRows);
    }